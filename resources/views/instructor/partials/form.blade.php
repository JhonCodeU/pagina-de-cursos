<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1']) !!}
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['class' => 'form-input block w-full mt-1']) !!}
</div>


<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitle del curso') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1']) !!}
</div>

<div class="mb-4">
    {!! Form::label('description', 'Description del curso') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1']) !!}
</div>

<div class="grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoria: ') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

    <div>
        {!! Form::label('level_id', 'Niveles: ') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

    <div>
        {!! Form::label('price_id', 'Precios: ') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1']) !!}
    </div>

</div>

<h2 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h2>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{ asset('storage/' . $course->image->url)}}" alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/2228561/pexels-photo-2228561.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
        @endisset
    </figure>
    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto a placeat explicabo, laboriosam repellat quis itaque, atque consequuntur nesciunt natus, soluta est ea nulla ipsam odio</p>
        {!! Form::file('file', ['form-input w-full', 'id' => 'file']) !!}
    </div>
</div>
