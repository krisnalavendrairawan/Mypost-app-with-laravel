<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['user', 'category']; //with sendiri merupakan fitur laravel untuk menjalankan eager loading agar menghindari N+1 problem

    public function scopeFilter($query, array $filters)
    {
        // if (request('search')) { //jika ada sesuatu yang ditulis di kolom pencarian
        // if (isset($filters['search']) ? $filters['search'] : false) { //jika dalam varible filters ada search maka ambil apapun yang ada dalam search jika tidak ada maka false
        //     //cara1
        //     // return $query->where('title', 'like', '%' . request('search') . '%') //cari berdaasrkan judul 
        //     //     ->orwhere('body', 'like', '%' . request('search') . '%');   //cari berdaasrkan body 

        //     //cara2
        //     // return $query->where('title', 'like', '%' . $filters['search'] . '%') //cari berdaasrkan judul 
        //     //     ->orwhere('body', 'like', '%' . $filters['search'] . '%');   //cari berdaasrkan body 
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) { //menggunakan null coalescing operator untuk membuat kondisi isset jadi tidak ditulis
            return $query->where('title', 'like', '%' . $search . '%') //cari berdaasrkan judul 
                ->orwhere('body', 'like', '%' . $search . '%');   //cari berdaasrkan body 

        });


        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) { //wherehas disini merupakan relasi tabel yang ada dimethod category
                //use category untuk mendefinisikan bahwa kita akan menggunakan parameter category yang ada diluar function 
                $query->where('slug', $category);
            });
        });


        // $query->when($filters['author'] ?? false, function ($query, $author) {
        //     $query->whereHas('author', function ($query) use ($author) {
        //         $query->where('username', $author);
        //     });
        // });
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )


        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); //1 post hanya dimiliki oleh satu user
    }
}
