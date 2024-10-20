<!DOCTYPE html> 
<html lang="en"> 


<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
</head> 
<body> 
    <h1></h1> 


   <div>title: {{ $note->title }}</div> 
    <div>description: {{ $note->description }}</div> 
    <div>content: {{ $note->content }}</div> 
    <div>Created at: {{$note->created_at}}</div> 

    <form action="{{ route('home') }}" method="GET"> 
        <button type="submit">Back</button> 
    </form> 

</body> 
</html> 
