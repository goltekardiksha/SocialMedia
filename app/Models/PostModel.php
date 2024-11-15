<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;
class PostModel extends Model
{
    protected $table            = 'posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'type', 'title', 'created_at', 'updated_at', 'deleted'];
   
    public function getPosts($filters = [])
    {
        //print_r($filters);
        $query = $this->db->table('posts p');
        $query->select('p.id,pt.name as type, pm.title,pm.description, u.username,
                          (SELECT COUNT(*) FROM likes WHERE post_id = p.id) AS likes_count,
                          (SELECT COUNT(*) FROM comments WHERE post_id = p.id) AS comments_count, p.created_at');
        $query->join('posts_meta pm', 'p.id = pm.post_id');
        $query->join('post_type pt', 'p.type = pt.id');
        $query->join('users u', 'p.user_id = u.id');
        $query->where('p.deleted', 0);

        if (!empty($filters['type'])) {
            $query->where('p.type', $filters['type']);
        }
        if (!empty($filters['sort_by'])) {
            if($filters['sort_by']=='likes'){
                $query->orderBy('likes_count', 'DESC');
            }
            else if($filters['sort_by']=='comments'){
                $query->orderBy('comments_count', 'DESC');
            }
            else
                $query->orderBy('p.created_at', $filters['sort_by']);
        }
        return $query->get()->getResultArray();
    }

    public function get_types() {
        $query = $this->db->table('post_type')->get();
        return $query->getResultArray();
    }

    public function getPostById($postId)
    {
        $session = Services::session();
        $query = $this->db->table('posts p');
        $query->select('p.id,pt.name as type, pm.title, pm.description, pm.meta_data, u.username, p.created_at, p.updated_at,(SELECT COUNT(*) FROM likes WHERE post_id = p.id) AS likes_count, if(lu.user_id is null, 0, 1) as likes_flag, p.created_at');
        $query->join('posts_meta pm', 'p.id = pm.post_id');
        $query->join('post_type pt', 'p.type = pt.id');
        $query->join('users u', 'p.user_id = u.id');
        $query->join('likes lu', 'p.id = lu.post_id AND lu.user_id = '.$session->get('user_id').'', 'left');
        $query->where('p.id', $postId);
        $query->where('p.deleted', 0);
        
        $post = $query->get()->getRowArray();

        if ($post) {
            $query = $this->db->table('comments c');
            $query->select('c.id, c.comment, u.username, c.created_at');
            $query->join('users u', 'c.user_id = u.id');
            $query->where('c.post_id', $postId);
            $query->where('c.deleted', 0);

            $comments = $query->get()->getResultArray();
            $post['comments'] = $comments;
            //print_r($post);exit;
        }
        return $post;
    }

}
