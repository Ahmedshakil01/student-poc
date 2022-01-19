<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comment') }}

            <a href="{{ route('comment.create') }}"><button class="btn btn-sm btn-dark" style="float: right;">Create New</button></a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Submitted by</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ $comment->age }}</td>
                                    <td>{{ $comment->rating }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>{{ $comment->created_by }}</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <a href="{{ route('comment.edit', $comment->id) }}" method="GET">
                                                Edit
                                            </a>
                                        </button>

                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger text-dark" type="submit" onclick="return confirm('Are you sure to delete this?');">
                                               delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
