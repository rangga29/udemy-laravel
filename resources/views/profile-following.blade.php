<x-profile :sharedData="$sharedData" docTitle="{{ $sharedData['username'] }}'s Following">
    @include('profile-following-only')
</x-profile>
