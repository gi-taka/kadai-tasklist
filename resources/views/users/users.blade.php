@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    @if (Auth::id() == $user->id)
                        <div>
                            <p>{!! link_to_route('users.show', 'My Profile', ['id' => $user->id]) !!}</p>
                        </div>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
    {{ $users->links('pagination::bootstrap-4') }}
@endif