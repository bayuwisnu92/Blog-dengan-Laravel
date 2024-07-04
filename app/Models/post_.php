<?php

namespace App\Models;



class post 
{
    private static $b_aray = [
        [
            "judul" => "nikah tajun ini",
            "slug" => "nikah-tajun-ini",
             "isi" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, voluptas vitae exercitationem omnis, vel quidem neque maiores, inventore harum ipsum autem minima eveniet incidunt ut. Voluptatum obcaecati tempore libero facilis quaerat. Suscipit recusandae ab, nihil corrupti ipsam nostrum vitae quae voluptates facere laudantium autem possimus mollitia praesentium facilis repellat. Eveniet."  
        ],
        [
            "judul" => "ku pinang kau dengan bismillah",
            "slug" => "ku-pinang-kau-dengan-bismillah",
             "isi" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis, voluptas vitae exercitationem omnis, vel quidem neque maiores, inventore harum ipsum autem minima eveniet incidunt ut. Voluptatum obcaecati tempore libero facilis quaerat. Suscipit recusandae ab, nihil corrupti ipsam nostrum vitae quae voluptates facere laudantium autem possimus mollitia praesentium facilis repellat. Eveniet."  
        ]
        ];

        public static function all(){
            return collect(self::$b_aray);
        }

        public static function find($slug)
        {
            $posts = static::all();
        //     $post = [];
        //         foreach ($posts as $p)
        //         if($p['slug'] === $slug){
        //     $post = $p;
        // }
        return $posts->firstWhere('slug',$slug);
        }
}
