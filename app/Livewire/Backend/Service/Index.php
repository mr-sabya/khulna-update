<?php

namespace App\Livewire\Backend\Service;

use App\Models\Service;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads, WithPagination;

    // public $services;
    public $name, $model_name, $slug, $image, $type = 'main', $newImage, $order, $bg_color;
    public $serviceId;
    public $allModels = [];

    public function mount()
    {
        // $this->loadServices();
        $this->loadModelList();
    }


    public function loadModelList()
    {
        $this->allModels = collect(File::files(app_path('Models')))
            ->map(function ($file) {
                return $file->getFilenameWithoutExtension();
            })->toArray();
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function resetForm()
    {
        $this->name = $this->model_name = $this->slug = $this->type = '';
        $this->order = 0;
        $this->bg_color = null;
        $this->image = $this->newImage = null;
        $this->serviceId = null;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'model_name' => 'required|string|unique:services,model_name,' . $this->serviceId,
            'slug' => 'required|unique:services,slug,' . $this->serviceId,
            'type' => 'required|string',
            'newImage' => $this->serviceId ? 'nullable|image|max:1024' : 'required|image|max:1024',
        ]);

        $imagePath = $this->image;

        if ($this->newImage) {
            $imagePath = $this->newImage->store('services', 'public');
        }

        Service::updateOrCreate(
            ['id' => $this->serviceId],
            [
                'name' => $this->name,
                'model_name' => $this->model_name,
                'slug' => $this->slug,
                'image' => $imagePath,
                'type' => $this->type ?? 'main',
                'order' => $this->order ?? 0,
                'bg_color' => $this->bg_color ?? null,
            ]
        );

        $this->resetForm();
        // $this->loadServices();
        session()->flash('success', 'Service saved successfully!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $this->serviceId = $service->id;
        $this->name = $service->name;
        $this->model_name = $service->model_name;
        $this->slug = $service->slug;
        $this->image = $service->image;
        $this->type = $service->type;
        $this->order = $service->order;
        $this->bg_color = $service->bg_color;
        $this->newImage = null;
    }

    public function delete($id)
    {
        Service::destroy($id);
        $this->loadServices();
        session()->flash('success', 'Service deleted.');
    }

    public function render()
    {
        return view('livewire.backend.service.index', [
            'services' => Service::latest()->paginate(10),
        ]);
    }
}
