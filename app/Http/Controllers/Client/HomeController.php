<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MangaRepository;
use App\Repositories\CommentRepository;

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
        $top5view = $this->mangaRepository->getTopView(config('assets.top5'));
        $suggest = $this->mangaRepository->getCategory($manga->categories[0]->slug);
        $view = $this->mangaRepository->countView($manga);
        $status = 0;
        if (!empty(session('users'))) {
            $status = $this->mangaRepository->checkFollow($manga->id);
        }
            
        return view('frontend.detail', compact('manga', 'top5view', 'suggest', 'status'));
    }

    public function getChapter($slug_manga, $slug_chapter)
    {
        $manga = $this->mangaRepository->getManga($slug_manga);
        $listchapter = $manga->chapters;
        $chapter = $this->mangaRepository->getChapter($slug_chapter);

        return view('frontend.chapter', compact('manga', 'chapter', 'listchapter'));
    }

    public function comment(Request $request)
    {
        $result = $this->mangaRepository->createComment($request->all());

        return $result;
    }

    public function follow($id)
    {
        if (empty(session('users')))
        {
            return response()->json([
                'error' => true,
                'message' => __('trans.is login'),
            ]);  
        }
        $result = $this->mangaRepository->follow($id);

        return $result;
    }

    public function listFollow(){
        if (empty(session('users')))
        {
            return response()->view('errors/404');
        }
        $manganew = session('users')->mangas;
        $top5view = $this->mangaRepository->getTopView(config('assets.top5'));

        return view('frontend.follow', compact('manganew', 'top5view'));
    }
}
