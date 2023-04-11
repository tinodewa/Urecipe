<?php

namespace App\Controllers;

use App\Models\RecipeModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        
        //cek apakah ada session bernama logged_in
		if(!$this->session->has('logged_in')){
            return redirect()->to('/login');
        }

        //cek position dari session
        if($this->session->get('position') == 'user'){
            return redirect()->to('/user');
        }

        $recipe = new RecipeModel();
        $data['recipe'] = $recipe->orderBy('id', 'asc')->paginate(10);
        $data['pager'] = $recipe->pager;
        echo view('admin_recipe', $data);
    }

    public function detail($id_recipe)
    {
        $recipe = new RecipeModel();
        $detail['show'] = $recipe->find($id_recipe);
        return view('admin_detail_recipe', $detail);
    }

    public function add()
    {
        return view('admin_add_recipe');
    }

    public function create()
    {
        $recipe = new RecipeModel();

        $result = $recipe->insert([
            'id_user' => 1,
            'name' => $this->request->getPost("add_name"),
            // 'description' => $this->request->getPost("add_desc")
        ]);

        if ($result == true) {
            return redirect()->to("/admin");
        } else {
            return redirect()->back()
                ->with('errors', $recipe->errors());
        }
    }

    public function delete($id_recipe)
    {
        $recipe = new RecipeModel();
        $detail['delete'] = $recipe->find($id_recipe);

        if ($this->request->getMethod() === 'post') {
            $recipe->delete($id_recipe);

            return redirect()->to('/admin')
                ->with('info', 'Berhasil menghapus data');
        }

        return view('admin_delete_recipe', $detail);
    }

    public function edit($id_recipe)
    {
        $recipe = new RecipeModel();
        $detail['edit'] = $recipe->find($id_recipe);
        return view('admin_edit_recipe', $detail);
    }

    public function update($id_recipe)
    {
        $recipe = new RecipeModel();

        $result = $recipe->update($id_recipe, [
            'name' => $this->request->getPost("update_name"),
            'description' => $this->request->getPost("update_desc")
        ]);


        return redirect()->to('/admin')
            ->with('info', 'Berhasil mengupdate data');
    }
}
