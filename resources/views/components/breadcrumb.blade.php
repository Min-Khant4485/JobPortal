<nav {{ $attributes }}>
    <ul class="flex space-x-4 text-orange-400 mt-3">
      <li>
        <a href="/">Home</a>
      </li>
  
      @foreach ($links as $label => $link)
        <li>→</li>
        <li>
          <a href="{{ $link }}">
            {{ $label }}
          </a>
        </li>
      @endforeach
    </ul>
</nav>