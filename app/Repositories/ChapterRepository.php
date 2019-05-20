<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Chapter;

class ChapterRepository extends BaseRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Chapter::class;
    }
}
