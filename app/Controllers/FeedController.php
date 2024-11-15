<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PostModel;
use Config\Services;

class FeedController extends BaseController
{
    public function index()
    {
        $session = Services::session();
        $session->set(['user_id' => 2]);
        return redirect()->to('/feed');
    }

    public function feed()
    {
        $filter['sort_by'] = 'DESC';
        $postModel = new PostModel();
        $data['posts'] = $postModel->getPosts($filter);
        $data['types'] = $postModel->get_types();
        return view('feed', $data);
    }

    public function getPosts(){
        $type=$this->request->getPost('type');
        $sortBy=$this->request->getPost('sort_by');
        if ($type) {
            $filter['type'] = $type;
        }
        if ($sortBy) {
            $filter['sort_by'] = $sortBy;
        }
        $postModel = new PostModel();
        $data['posts'] = $postModel->getPosts($filter);
        if($data['posts']){
            $data['status']='success';
        }
        echo json_encode($data);
    }

    public function view($id)
    {
        $postModel = new PostModel();
        $data= $postModel->getPostById($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Post not found');
        }
        else{
            $metaData = json_decode($data['meta_data'], true);
            $session = Services::session();
            $user=$session->get('user_id');
            //print_r( $metaData);
            return view('post_view', ['post'=>$data,'metaData' => $metaData,'user' => $user]);
        } 
    }
}
