<?php

namespace App\Controllers;

use App\Models\RecipeModel;

class User extends BaseController
{

    public function index()
    {
        $session = session();
        //cek apakah ada session bernama logged_in
        if (!$session->has('logged_in')) {
            return redirect()->to('/login');
        }

        //cek position dari session
        if ($session->get('position') == 'admin') {
            return redirect()->to('/admin');
        }

        $recipe = new RecipeModel();
        $data['recipe'] = $recipe->orderBy('id', 'asc')->paginate(10);
        $data['pager'] = $recipe->pager;
        echo view('user_recipe', $data);
    }
}
