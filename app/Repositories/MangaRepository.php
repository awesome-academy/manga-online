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
}
