@extends('layouts.master')
@section('content')

  @include('inc.search')
  @include('inc.filter')
  <div id="user_data">
    @include('pages.user_data')
  </div>
  @endsection

  @push('scripts')
      <script>
          $(document).ready(function () {
            $(document).on('click', '.pagination a', function (event){
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                console.log(page);
                getMoreUsers(page);
            });

              $('#search').on('keyup', function () {
                  $value = $(this).val();
                  getMoreUsers(1);
              });
              $('#country').on('change', function (){
                  getMoreUsers();
              });
              $('#sort_by').on('change', function (){
                 getMoreUsers()
              });
              $('#salary_range').on('change', function (){
                 getMoreUsers()
              });
          });

          function getMoreUsers(page){
              let search = $('#search').val();
              let selectedCountry = $('#country option:selected').val();
              let selectedType = $('#sort_by option:selected').val();
              let framework = $('#salary_range option:selected').val();
              console.log(selectedCountry)
            $.ajax({
                type : "GET",
                data : {
                    'search_query' : search,
                    'selected_country' : selectedCountry,
                    'sort_by' : selectedType,
                    'framework' : framework
                },
                url : "{{route('users.get-more-users')}}" + "?page=" + page,
                timeout: 10000,
                success:function (data) {
                    $('#user_data').html(data);
                }
            });
          }
      </script>
  @endpush

