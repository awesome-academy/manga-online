<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Manga;

class MangaRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Manga::class;
    }
    public function store($request){
        if ($request->hasFile('image')){     
            $path = $request->file('image')->store('public/images');
            $data['image'] = strstr( $path, '/' );
        }
        $data['name'] = $request->name;
        $data['rate'] = $request->rate;
        $data['total_rate'] = $request->total_rate;
        $data['slug'] = str_slug($request->slug);
        $data['description'] = $request->description;
        $data['status'] = 1;
        $data['cover'] = $request->cover;
        $manga = Manga::create($data);

        return $manga;
    }

    public function updateStatus($id)
    {
        $result = $this->_model->findOrFail($id);
        $result->status = 1 - $result->status;
        $result->save();

        return $result->status;
    }

    public function updateManga($request)
    {
        $result = $this->find($request->id);
        if ($request->hasFile('image')){     
            $path = $request->file('image')->store('public/images');
            $result->image = strstr( $path, '/' );
        }
        $result->name = $request->name;
        $result->rate = $request->rate;
        $result->total_rate = $request->total_rate;
        $result->slug = $request->slug;
        $result->description = $request->description;
        $result->cover = $request->cover;
        $result->save();

        return $result;
    }
}
