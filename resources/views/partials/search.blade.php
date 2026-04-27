<form :action="{{route('blog.index')}}" method="get">
    @csrf
    <x-text-input class="w-96" name="search" :placeholder="__('Search')" value="{{old('search')}}"/>
    <x-button.primary>{{__('Search')}}</x-button.primary>
</form>