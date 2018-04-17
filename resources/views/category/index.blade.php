{{ app()->getLocale() }}<br/>
@foreach ($posts as $post)
        {{$post}}
@endforeach

<?php /*
foreach($posts as $post){
    echo $post . '<br/>';
}*/
?>