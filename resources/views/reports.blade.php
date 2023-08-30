@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Corruption Reports</h1>

    <table class="table" style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Region</th>
                <th>Organization</th>
                <th >Incident</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
            <tr >
                <td>{{ $report->id }}</td>
                <td>{{ $report->name }}</td>
                <td>{{ $report->email }}</td>
                <td>{{ $report->region }}</td>
                <td>{{ $report->organization }}</td>
                <td>{!! nl2br(e($report->incident)) !!}</td>

                <td>
                    <button class="btn btn-primary btn" data-toggle="modal" data-target="#viewFilesModal{{ $report->id }}">View Files</button>
                </td>
                <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $report->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modals -->
    @foreach ($reports as $report)
    <!-- View Files Modal -->
    <div class="modal fade" id="viewFilesModal{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="viewFilesModalLabel{{ $report->id }}">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewFilesModalLabel{{ $report->id }}">View Files</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach (json_decode($report->file_paths) ?? [] as $file)
                    <p><a href="{{ asset('storage/files/' . $file) }}" target="_blank">{{ $file }}</a></p>
                @endforeach
                
                <a href="{{ route('generate-pdf', ['id' => $report->id]) }}" class="btn btn-primary" target="_blank">Download PDF</a>

                </div>
            </div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="confirmDeleteModal{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $report->id }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel{{ $report->id }}">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this report?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('delete-report', $report->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <div style="position: fixed; bottom: 10px; left: 10px;">
            <a class="btn btn-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"
                style="color: white;">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
