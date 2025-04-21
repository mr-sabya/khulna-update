<div>
    <div class="row">
        <!-- Form Section -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $serviceId ? 'Edit' : 'Add' }} Service</h4>

                </div>
                <div class="card-body">

                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" wire:model="name">
                        </div>

                        <div class="mb-3">
                            <label>Model Name</label>
                            <select class="form-control" wire:model="model_name">
                                <option value="">Select Model</option>
                                @foreach ($allModels as $model)
                                <option value="{{ $model }}">{{ $model }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Slug</label>
                            <input type="text" class="form-control" wire:model="slug">
                        </div>

                        <div class="mb-3">
                            <label>Type</label>
                            <select class="form-control" wire:model="type">
                                <option value="">Select Type</option>
                                <option value="main">Main</option>
                                <option value="sub">Sub</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" class="form-control" wire:model="newImage">
                            <div class="mt-2">
                                @if ($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" width="100" class="img-thumbnail">
                                @elseif ($image)
                                <img src="{{ asset('storage/' . $image) }}" width="100" class="img-thumbnail">
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Order</label>
                            <input type="number" class="form-control" wire:model="order">
                        </div>

                        <div class="mb-3">
                            <label>Background Color</label>
                            <select wire:model="bg_color" class="form-control" id="bg_color">
                                <option value="">Select Color</option>
                                <option value="lavender">Lavender</option>
                                <option value="cornsilk">Cornsilk</option>
                                <option value="honeydew">Honeydew</option>
                                <option value="ghostwhite">Ghostwhite</option>
                                <option value="white">White</option>
                            </select>
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-secondary" type="button" wire:click="resetForm">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Service</h4>

                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover text-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Model</th>
                                <th>Slug</th>
                                <th>Type</th>
                                <th>Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $srv)
                            <tr>
                                <td>
                                    @if ($srv->image)
                                    <img src="{{ asset('storage/' . $srv->image) }}" width="50">
                                    @endif
                                </td>
                                <td>{{ $srv->name }}</td>
                                <td>{{ $srv->model_name }}</td>
                                <td>{{ $srv->slug }}</td>
                                <td>{{ $srv->type }}</td>
                                <td>{{ $srv->order }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning" wire:click="edit({{ $srv->id }})">Edit</button>
                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $srv->id }})">Delete</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No services found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
</div>