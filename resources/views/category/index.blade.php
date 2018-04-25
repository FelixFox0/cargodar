{{ app()->getLocale() }}<br/>
@foreach ($posts as $post)
        {{$post}}<br/>
@endforeach

<?php /*
foreach($posts as $post){
    echo $post . '<br/>';
}*/
?>