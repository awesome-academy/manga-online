<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MangaRepository;

class HomeController extends Controller
{
    protected $mangaRepository;

    public function __construct(MangaRepository $mangaRepository)
    { 
        $this->mangaRepository = $mangaRepository;
    }

    public function index()
    {
        $manganew = $this->mangaRepository->getLimit();
        $top5view = $this->mangaRepository->getTopView(config('assets.top5'));

        return view('frontend.home', compact('manganew', 'top5view'));
    }

    public function getCategory($cate)
    {
        $manganew = $this->mangaRepository->getCategory($cate);
        $top5view = $this->mangaRepository->getTopView(config('assets.top5'));

        return view('frontend.category', compact('manganew', 'top5view'));
    }

    public function getManga($slug)
    {
        $manga = $this->mangaRepository->getManga($slug);
        if ($manga == null) {

            return response()->view('errors/404');
        }
        $top5view = $this->mangaRepository->getTopView(config('assets.top5'));
        $category = $manga->categories;
        $authors = $manga->authors;
        $chapters = $manga->chapters;
        $suggest = $this->mangaRepository->getCategory($category[0]->slug);
        if (!isset($_COOKIE['status_view'])) {
            $manga->view = $manga->view + 1;
            $manga->save();
            Setcookie('status_view', $manga->id, time() + 60);
        } elseif ($_COOKIE['status_view'] !=  $manga->id){
            $manga->view = $manga->view + 1;
            $manga->save();
            Setcookie('status_view', $manga->id, time() + 60);
        } 

        return view('frontend.detail', compact('manga', 'top5view', 'category', 'authors', 'chapters', 'suggest'));
    }

    public function getChapter($slug_manga, $slug_chapter)
    {
        $manga = $this->mangaRepository->getManga($slug_manga);
        $listchapter = $manga->chapters;
        $chapter = $this->mangaRepository->getChapter($slug_chapter);

        return view('frontend.chapter', compact('manga', 'chapter', 'listchapter'));
    }

}
