@extends('admin.layout.partials.crud')
@section('section-title')
    Events
@endsection
@section('table')
    {{-- @component('admin.components.data-filter')
    @endcomponent --}}
    <header>
        <p>{{trans_choice('admin/pagination.total',  5, ['count' => 5])}}</p>
        <button class="filter-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M14,12V19.88C14.04,20.18 13.94,20.5 13.71,20.71C13.32,21.1 12.69,21.1 12.3,20.71L10.29,18.7C10.06,18.47 9.96,18.16 10,17.87V12H9.97L4.21,4.62C3.87,4.19 3.95,3.56 4.38,3.22C4.57,3.08 4.78,3 5,3V3H19V3C19.22,3 19.43,3.08 19.62,3.22C20.05,3.56 20.13,4.19 19.79,4.62L14.03,12H14Z" />
            </svg>
        </button>
        @component('admin.components.modal')
            <x-slot:class>filter</x-slot:class>
            <x-slot:title>{{ __('admin/filter.filtertitle') }}</x-slot:title>
            <form>
                <div class="form-field">
                    <label for="filter-name">Nombre:</label>
                    <input type="text" name="filter-name" id="filter-name">
                </div>
                <div class="form-field">
                    <label for="filter-email">Email:</label>
                    <input type="email" name="filter-email" id="filter-email">
                </div>
            </form>
            <div class="buttons">
                <button>Aceptar</button>
                <button class="close">Cancelar</button>
            </div>
        @endcomponent
    </header>
    <div class="list-content">
        @isset($events)
            @foreach ($events as $event_element)
                <div class="data-table">
                    <div class="data-table-header">
                        <button class="edit-button" data-endpoint="{{route('events_edit', ["event"=>$event_element->id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                            </svg>
                        </button>
                        <button class="delete-button" data-endpoint="{{route('events_destroy', ["event"=>$event_element->id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M9,8H11V17H9V8M13,8H15V17H13V8Z" />
                            </svg>
                        </button>
                    </div>
                    <div class="data-table-content">
                        <p><span>Name:</span> {{$event_element->name}}</p>
                        <p><span>Town:</span> {{$event_element->town->name}}</p>
                        <p><span>Start date:</span> {{$event_element->start_date}}</p>
                        <p><span>End date:</span> {{$event_element->end_date}}</p>
                        <p><span>start time:</span> {{$event_element->start_time}}</p>
                        <p><span>End date:</span> {{$event_element->end_time}}</p>
                        <p><span>Adress:</span> {{$event_element->address}}</p>
                        <p><span>Price:</span> {{$event_element->price}}€</p>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
    <footer>
        <div class="pagination">
            <button class="first-page">
                <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.852 54.4136C9.04933 52.2298 9.04934 46.7702 12.852 44.5864L80.444 5.76861C84.2467 3.58477 89 6.31457 89 10.6822V88.3178C89 92.6854 84.2467 95.4152 80.444 93.2314L12.852 54.4136Z" fill="#D9D9D9"/>
                </svg>
            </button>
            <button>1</button>
            <button disabled>···</button>
            <button class="current-page" >5</button>
            <button disabled>···</button>
            <button>10</button>
            <button class="last-page">
                <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.852 54.4136C9.04933 52.2298 9.04934 46.7702 12.852 44.5864L80.444 5.76861C84.2467 3.58477 89 6.31457 89 10.6822V88.3178C89 92.6854 84.2467 95.4152 80.444 93.2314L12.852 54.4136Z" fill="#D9D9D9"/>
                </svg>
            </button>
        </div>
    </footer>
@endsection
@section('form')
    <div class="add-header">
        <div class="tabs">
            <div class="tab selected" data-field="principal">
                <h3>Principal</h3>
            </div>
            <div class="tab" data-field="images">
                <h3>Imágenes</h3>
            </div>
        </div>
        <div class="add-buttons">
            <button class="clean-button" data-endpoint="{{route('events_create')}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M16.24,3.56L21.19,8.5C21.97,9.29 21.97,10.55 21.19,11.34L12,20.53C10.44,22.09 7.91,22.09 6.34,20.53L2.81,17C2.03,16.21 2.03,14.95 2.81,14.16L13.41,3.56C14.2,2.78 15.46,2.78 16.24,3.56M4.22,15.58L7.76,19.11C8.54,19.9 9.8,19.9 10.59,19.11L14.12,15.58L9.17,10.63L4.22,15.58Z" />
                </svg>
            </button>
            <button class="save-button" data-endpoint="{{route('events_store')}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" />
                </svg>
            </button>
        </div>
    </div>
    <form class="admin-form">
        <input type="hidden" name="id" value="{{$event->id ?? ''}}">
        <div class="tab-content selected" data-field="principal">
            <div class="form-row">
                <div class="form-field">
                    <label for="name">Evento:</label>
                    <input type="text" name="name" value="{{$event->name ?? ''}}">
                </div>
                <div class="form-field">
                    <label for="town_id">Población:</label>
                    <select name="town_id">
                        <option value="" disabled selected>Población</option>
                        @foreach ($towns as $town)
                            <option value="{{$town->id}}" {{$town->id == $event->town_id ? 'selected' : ''}}>{{$town->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-field">
                    <label for="start_date">Start date:</label>
                    <input type="date" name="start_date" value="{{$event->start_date ?? ''}}">
                </div>
                <div class="form-field">
                    <label for="end_date">End date:</label>
                    <input type="date" name="end_date" value="{{$event->end_date ?? ''}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-field">
                    <label for="start_time">Start time:</label>
                    <input type="time" name="start_time" value="{{$event->start_time ?? ''}}">
                </div>
                <div class="form-field">
                    <label for="end_time">End time:</label>
                    <input type="time" name="end_time" value="{{$event->end_time ?? ''}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-field">
                    <label for="address">Adress:</label>
                    <input type="text" name="address" value="{{$event->address ?? ''}}">
                </div>
                <div class="form-field">
                    <label for="price">Price:</label>
                    <input type="number" name="price" value="{{$event->price ?? 0.00}}">
                </div>
            </div>
            <div class="add-header">
              <div class="tabs">
                @foreach($languages as $language)
                  <div class="tab {{$loop->first == 1 ? 'selected' : ''}}" data-field="{{$language->label}}">
                      <h3>{{$language->label}}</h3>
                  </div>
                @endforeach
              </div>
            </div>
            @foreach($languages as $language)
              <div class="tab-content {{$loop->first == 1 ? 'selected' : ''}}" data-field="{{$language->label}}">
                <div class="form-row">
                  <div class="form-field">
                      <label for="locale[title.{{$language->label}}]">Title:</label>
                      <input type="text" name="locale[title.{{$language->label}}]" value="{{$event['title.'.$language->label] ?? ''}}">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-field">
                    <label for="locale[description.{{$language->label}}]">Description:</label>
                    <textarea name="locale[description.{{$language->label}}]" value="{{$event['description.'.$language->label] ?? ''}}"></textarea>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
        <div class="tab-content" data-field="images">
            <div class="form-row">
                <div class="form-field">
                    <label for="avatar">Avatar:</label>
                    <label class="file-icon" for="avatar">
                        Buscar imágen:
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M5,20H19V18H5M19,9H15V3H9V9H5L12,16L19,9Z" />
                        </svg>
                    </label>
                    <input type="file" name="avatar" id="avatar">
                </div>
            </div>
        </div>
    </form>
@endsection