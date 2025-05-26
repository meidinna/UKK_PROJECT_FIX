<div class="container-fluid p-0 vh-100 d-flex flex-column">
    <!-- Header -->
    <div class="bg-primary text-white p-3 shadow-sm">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">Dashboard Siswa</h1>
            <div class="d-flex align-items-center">
                <span class="me-3">29°C Berawan</span>
                <span class="me-3">ENG</span>
                <span>{{ now()->format('H:i d/m/Y') }}</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4 overflow-auto">
        <div class="card shadow-sm h-100">
            <!-- Card Header -->
            <div class="card-header bg-white border-bottom">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <h5 class="mb-0">Data Siswa</h5>
                    </div>
                    <div class="col-md-8">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <select wire:model.live="selected_gender" class="form-select form-select-sm">
                                    <option value="">Semua Gender</option>
                                    @foreach($genders as $key => $gender)
                                        <option value="{{ $key }}">{{ $gender }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select wire:model.live="selected_rombel" class="form-select form-select-sm">
                                    <option value="">Semua Rombel</option>
                                    @foreach($rombels as $key => $rombel)
                                        <option value="{{ $key }}">{{ $rombel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select wire:model.live="selected_abjad" class="form-select form-select-sm">
                                    <option value="">Urutkan</option>
                                    <option value="A-Z">A-Z</option>
                                    <option value="Z-A">Z-A</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button wire:click="resetFilters" class="btn btn-sm btn-outline-secondary w-100">
                                    <i class="fas fa-sync-alt me-1"></i> Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body p-0">
                <div class="table-responsive h-100">
                    <table class="table table-hover mb-0">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th width="10%">NIS</th>
                                <th width="20%">Nama</th>
                                <th width="10%">Gender</th>
                                <th width="10%">Rombel</th>
                                <th width="20%">Alamat</th>
                                <th width="10%">Kontak</th>
                                <th width="15%">Email</th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($siswas as $siswa)
                                <tr>
                                    <td>{{ $siswa->nis }}</td>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $genders[$siswa->gender] ?? '-' }}</td>
                                    <td>{{ $rombels[$siswa->rombel] ?? '-' }}</td>
                                    <td>{{ Str::limit($siswa->alamat, 30) }}</td>
                                    <td>{{ $siswa->kontak }}</td>
                                    <td>{{ $siswa->email }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button wire:click="edit({{ $siswa->id }})" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button wire:click="delete({{ $siswa->id }})" 
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">Tidak ada data siswa ditemukan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="card-footer bg-white border-top">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="input-group" style="width: 300px">
                        <input type="text" wire:model.live="search" class="form-control form-control-sm" placeholder="Type here to search...">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <div>
                        {{ $siswas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    body {
        overflow: hidden;
    }
    .table-responsive {
        max-height: calc(100vh - 250px);
    }
    .table thead th {
        position: sticky;
        top: 0;
        background-color: #f8f9fa;
    }
    .form-select-sm, .form-control-sm {
        font-size: 0.875rem;
        padding: 0.25rem 0.5rem;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
</style>
@endpush