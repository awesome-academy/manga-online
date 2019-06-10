<?php

namespace App\Http\Controllers\Client;

use App\Models\Follow;
use App\Models\User;
use App\Repositories\MangaRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct(UserRepository $userRepository, MangaRepository $mangaRepository)
    {
        $this->UserRepository = $userRepository;
        $this->MangaRepository = $mangaRepository;
    }

    public function profile()
    {
        $user = session('users');

        return view('frontend.profile.info', [
            'user' => $user,
        ]);
    }

    public function saveProfile(Request $request)
    {
        $result = User::find($request->_id)->update($request->all());
        if ($result) {
            session('users')->fullname = $request->fullname;

            return redirect(url()->previous())->with([
                'response' => [
                    'status' => 'success',
                    'messages' => trans('backend.store_data', ['function' => trans('auth.profile')]) . ' ' . trans('backend.success'),
                    'data' => null,
                ],
            ]);
        }

        return redirect(url()->previous())->with([
            'response' => [
                'status' => 'danger',
                'messages' => trans('backend.store_data', ['function' => trans('auth.profile')]) . ' ' . trans('backend.error'),
                'data' => null,
            ],
        ]);
    }

    public function mangaFollow()
    {
        $mangas = Follow::with(['manga' => function ($query) {
            $query->with(['lastChapter' => function ($query) {
                $query->latest()->first();
            }]);
        }, 'chapter'])->where('user_id', $this->UserRepository->getAuthId())->latest()->paginate(config('paginate.client.profile.follow'));

        return view('frontend.profile.follow', [
            'mangas' => $mangas,
        ]);
    }
}
