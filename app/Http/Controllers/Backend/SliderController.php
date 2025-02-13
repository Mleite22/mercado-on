<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //Envio de imagem
    use UploadImageTrait;

    /**
     * Exiba uma listagem do recurso. 
     */
    public function index(SliderDataTable $dataTable)
    {
        // return view('admin.slider.index');
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Mostra o formulário para criação de um novo recurso.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Armazene um recurso recém-criado no armazenamento.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'banner' => ['required', 'image', 'max:2048'],
            'title_one' => ['string', 'max:255'],
            'title_two' => ['required', 'max:255'],
            'starting_price' => ['max:255'],
            'link' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required'],
        ]);
        $slider = new slider();

        $imagePath = $this->uploadImage($request, 'banner', 'uploads/slider');

        $slider->banner = $imagePath;
        $slider->title_one = $request->title_one;
        $slider->title_two = $request->title_two;
        $slider->starting_price = $request->starting_price;
        $slider->link = $request->link;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr()->success('Cadastrado com sucesso!');
        return redirect()->route('slider.index');
    }

    /**
     * Exiba o recurso especificado.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Mostre o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Atualize o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'banner' => ['nullable','image', 'max:2048'],
            'title_one' => ['string', 'max:255'],
            'title_two' => ['required', 'max:255'],
            'starting_price' => ['max:255'],
            'link' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required'],
        ]);
        $slider = Slider::findOrFail($id);

        $imagePath = $this->updateImage($request, 'banner', 'uploads/slider', $slider->banner);

        $slider->banner = empty(!$imagePath) ? $imagePath : $slider->banner;
        $slider->title_one = $request->title_one;
        $slider->title_two = $request->title_two;
        $slider->starting_price = $request->starting_price;
        $slider->link = $request->link;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr()->success('Atualizado com sucesso!');
        return redirect()->route('slider.index');
    }

    /**
     * Remova o recurso especificado do armazenamento.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $this->deleteImage($slider->banner);
        $slider->delete();
        return response(['status' => 'success', 'message' => 'Excluido com sucesso!']);
    }
}
