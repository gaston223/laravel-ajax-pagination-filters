<div class="container">

  @foreach($users as $key)
  <div class="card">
    <div class="card-header">
      <img src="{{ asset('assets/images/dev.png') }}" alt="" />
    </div>
    <div class="card-body">
      <span class="tag tag-pink">{{ $key->type }}</span>
      <hr>
      <span class="tag tag-salary">Framework: {{ $key->framework }}</span>
        <h3>{{$key->fname}}</h3>
      <h4>{{ $key->email }}</h4>
      <p>
        {{ $key->address }}
      </p>

      <h4>Country: {{ $key->country }}</h4>
      <div class="user">

        <img src="{{ asset('assets/images/user-3.jpg') }}" alt="" />
        <div class="key-info">
          <h5>{{ $key->fname}}</h5>
          <small>{{ date('d.m.Y H:i:s', strtotime($key->created_at)) }}</small>

        </div>
      </div>
    </div>
  </div>
  @endforeach
  <div class="">
      {!! $users->links() !!}
  </div>
</div>