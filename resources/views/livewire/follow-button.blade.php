<div>
    {{-- <button
        wire:click='like'
        class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs font-semibold"
        style="font-size: 10px"
        name="user_id"
        value="">Follow
        </button> --}}

        @if(!$isFollowed)

            <button wire:click="follow" class="btn btn-default">
                Follow
            </button>

        @else

            <button wire:click="unfollow" class="btn btn-default">
                Unfollow
            </button>

        @endif
  
</div>
