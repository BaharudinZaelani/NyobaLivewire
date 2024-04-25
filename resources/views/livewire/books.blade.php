<div>
    {{-- input form --}}
    <h1>Input Books</h1>
    <hr>
    <form wire:submit="save">
        <table>
            <tr>
                <td>
                    <label>Nama buku</label>
                </td>
                <td>
                    <input type="text" wire:model="title" style="width: 350px;">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Deskripsi Buku</label>
                </td>
                <td>
                    <textarea wire:model="description" style="width: 350px;"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Submit</button></td>
            </tr>
        </table>
    </form>
    <div>
        <table border="1" cellpadding='10' cellspacing='0'>
            <thead>
                <tr>
                    <th></th>
                    <th>no</th>
                    <th>nama</th>
                    <th>deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>
                            <button wire:click="remove({{ $item->id }})">Hapus</button>
                        </td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <span wire:loading>Saving...</span>
    </div>
</div>
