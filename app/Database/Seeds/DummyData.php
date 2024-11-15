<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DummyData extends Seeder
{
    public function run()
    {
       
            $data['users'][] = [
                'username'      => 'Diksha',
                'email'     => "diksha@gmail.com",
                'password'   => md5('admin@123'),
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'), 
            ];
            $data['users'][] = [
                'username'      => 'Swati',
                'email'     => "swati@gmail.com",
                'password'   =>  md5('admin@123'),
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'), 
            ];
        

        // Insert the data into the table
        $this->db->table('users')->insertBatch($data['users']);

        $data['posttype'][] = [
            'name'      => 'news',
            'deleted'     => 0,
            'created_at'=> date('Y-m-d H:i:s'),
        ];
        $data['posttype'][] = [
            'name'      => 'event',
            'deleted'     => 0,
            'created_at'=> date('Y-m-d H:i:s'),
        ];
        $data['posttype'][] = [
            'name'      => 'job',
            'deleted'     => 0,
            'created_at'=> date('Y-m-d H:i:s'),
        ];
    

    // Insert the data into the table
    $this->db->table('post_type')->insertBatch($data['posttype']);

    $data['posts'][] = [
        'user_id'   => 1,
        'type'      => 1,
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
        'updated_at'=> date('Y-m-d H:i:s'),
    ];
    $data['posts'][] = [
        'user_id'   => 2,
        'type'      => 2,
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
        'updated_at'=> date('Y-m-d H:i:s'),
    ];
    $data['posts'][] = [
        'user_id'   => 2,
        'type'      => 3,
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
        'updated_at'=> date('Y-m-d H:i:s'),
    ];
    $data['posts'][] = [
        'user_id'   => 1,
        'type'      => 3,
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
        'updated_at'=> date('Y-m-d H:i:s'),
    ];


    // Insert the data into the table
    $this->db->table('posts')->insertBatch($data['posts']);

    
$a1=array(
    'published by' => 'Times of India',
);
    $data['posts_meta'][] = [
        'post_id'   => 1,
        'title'     =>'The Top 10 Movies You Can’t Miss This Year',
        'description' => 'As the year unfolds, the film industry is gearing up to deliver an exciting lineup of must-watch movies. From long-awaited sequels to original blockbusters, there\'s something for every movie lover. Whether you\'re a fan of heart-pounding action, spine-tingling thrillers, heartwarming dramas, or epic sci-fi adventures, these top 10 films promise to captivate audiences worldwide. In this list, we highlight the year\'s most anticipated releases, the films that are generating the most buzz, and those that are expected to dominate the box office and award circuits',
        'meta_data' => json_encode($a1),
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
        'updated_at'=> date('Y-m-d H:i:s'),
    ];

    $a2=array(
        'start date' => '2024-11-14',
        'end date' => '2024-11-14',
        'Time' => '11am - 5pm',
        'location' => 'Azad bhavan, Panjim, Goa',
        'organized by' => 'ABC group',
        'entry fee' => 'Nil',
        'speaker' => 'John'

    );
    $data['posts_meta'][] = [
        'post_id'   => 2,
        'title'     =>'How to Build a High-Impact Startup from Scratch',
        'description' => 'Thinking about starting your own business? This talk will guide you through the essential steps of building a startup that not only survives but thrives in today’s competitive market. Our speaker, a successful entrepreneur, will share their journey and the lessons learned from creating a high-impact startup. Topics covered include identifying market opportunities, securing funding, building a brand, and scaling your business. Don’t miss out on this valuable opportunity to learn the secrets of successful entrepreneurship',
        'meta_data' => json_encode($a2),
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
        'updated_at'=> date('Y-m-d H:i:s'),
    ];
    $a3=array(
        'start date' => '2024-11-16',
        'end date' => '2024-11-18',
        'Time' => '5pm - 11pm',
        'location' => 'Hill Top, Vagator, Goa',
        'organized by' => 'XYZ group',
        'entry fee' => '500 per person',
        '1st day performer' =>'DJ chetas',
        '2nd day performer' =>'Arjit & Shreya',
        '3nd day performer' =>'Shaan',

    );
    $data['posts_meta'][] = [
        'post_id'   => 3,
        'title'     =>'Sunset Beats: An Evening of Chill Music and Vibes',
        'description' => 'Join us for an unforgettable evening as we celebrate the magic of live music at Sunset Beats. Set against the stunning backdrop of a sunset, this event brings together talented local artists performing chill, soulful tunes that will put you in the perfect mood to unwind and relax. Whether you\'re into acoustic, indie, or laid-back electronic beats, this event promises to be a night full of good vibes, great music, and unforgettable moments. Bring your friends, your love for music, and your dancing shoes!',
        'meta_data' => json_encode($a3),
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
        'updated_at'=> date('Y-m-d H:i:s'),
    ];
    $a4=array(
        'company name' => 'ABC',
        'Location' => 'Panjim',
        'employee type' => 'fulltime',
        'email us at' => 'abc@gmail.com',
        'Qualification' => 'Develop and maintain both client-side and server-side applications.
        Write clean, scalable, and efficient code.
        Design and implement new features and functionality for web-based applications.Collaborate with UX/UI designers to create intuitive, responsive, and visually appealing user interfaces',
        'Responsibilities' => 'Proven experience as a Full Stack Developer or similar role.
        Strong knowledge of front-end technologies (HTML, CSS, JavaScript, React).
        Experience with back-end programming languages (Node.js, Python, Java, Ruby, etc.).
        Proficiency with databases (SQL).
        Familiarity with version control systems.',
    );
    $data['posts_meta'][] = [
        'post_id'   => 4,
        'title'     =>'We are Hiring Software Developer',
        'description' => 'We are seeking a highly skilled Software Developer to join our team and contribute to the design, development, and maintenance of our web applications. As a Software Developer, you will work with both front-end and back-end technologies to create seamless and dynamic user experiences. Your work will span the entire development lifecycle, from concept to implementation, ensuring our products are innovative, functional, and user-friendly.',
        'meta_data' => json_encode($a4),
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
        'updated_at'=> date('Y-m-d H:i:s'),
    ];


    // Insert the data into the table
    $this->db->table('posts_meta')->insertBatch($data['posts_meta']);

    
    $data['comments'][] = [
        'post_id'      => 1,
        'user_id'      => 1,
        'comment'   => 'Great list! I\'m definitely marking my calendar for one or two',
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
    ];
    $data['comments'][] = [
        'post_id'      => 1,
        'user_id'      => 2,
        'comment'   => "Wow, this is such an exciting list!",
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
    ];
    $data['comments'][] = [
        'post_id'      => 2,
        'user_id'      => 1,
        'comment'   => 'Wow, this is such an exciting event!',
        'deleted'     => 0,
        'created_at'=> date('Y-m-d H:i:s'),
    ];


// Insert the data into the table
$this->db->table('comments')->insertBatch($data['comments']);

$data['likes'][] = [
    'post_id'      => 1,
    'user_id'      => 1,
    'deleted'     => 0,
    'created_at'=> date('Y-m-d H:i:s'),
];
$data['likes'][] = [
    'post_id'      => 1,
    'user_id'      => 2,
    'deleted'     => 0,
    'created_at'=> date('Y-m-d H:i:s'),
];
$data['likes'][] = [
    'post_id'      => 2,
    'user_id'      => 1,
    'deleted'     => 0,
    'created_at'=> date('Y-m-d H:i:s'),
];
$data['likes'][] = [
    'post_id'      => 2,
    'user_id'      => 2,
    'deleted'     => 0,
    'created_at'=> date('Y-m-d H:i:s'),
];
$data['likes'][] = [
    'post_id'      => 3,
    'user_id'      => 1,
    'deleted'     => 0,
    'created_at'=> date('Y-m-d H:i:s'),
];
$data['likes'][] = [
    'post_id'      => 4,
    'user_id'      => 1,
    'deleted'     => 0,
    'created_at'=> date('Y-m-d H:i:s'),
];


// Insert the data into the table
$this->db->table('likes')->insertBatch($data['likes']);

    }
}
