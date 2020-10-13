<ul class="nav navbar-nav collapse navbar-collapse">
    <li><a href="{{route('home')}}" class="active">Home</a></li>
    @foreach($categories as $category)
        <li class="dropdown">
            <a href="{{route('category',['id'=>$category->id,'slug'=>$category->name])}}">{{$category->name}}
                @if($category->getChildCategory()->count() > 0 )
                    <i class="fa fa-angle-down"> </i>
                @endif
            </a>
            <ul role="menu" class="sub-menu">
                @if($category->getChildCategory()->count() > 0 )
                    @foreach($category->getChildCategory()->get() as $categoryChild)
                        <li class="dropdown"><a
                                href="{{route('category',['id'=>$categoryChild->id,'slug'=>$categoryChild->name])}}">{{$categoryChild->name}}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
    @endforeach
</ul>
