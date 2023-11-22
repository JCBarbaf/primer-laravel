@extends('admin.layout.partials.crud')
@section('section-title')
    Eventos
@endsection
@section('data-list')
    <div class="data-table">
        <div class="data-table-header">
            <button class="edit-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                </svg>
            </button>
            <button class="delete-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M9,8H11V17H9V8M13,8H15V17H13V8Z" />
                </svg>
            </button>
        </div>
        <div class="data-table-content">
            <p><span>Titulo:</span> The game awards</p>
            <p><span>Fecha:</span> 08/12/2023</p>
            <p><span>Hora:</span> 01:30</p>
            <p><span>Precio:</span> 0€</p>
        </div>
    </div>
@endsection
@section('data-add')
    <div class="add-header">
        <button class="clean-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M16.24,3.56L21.19,8.5C21.97,9.29 21.97,10.55 21.19,11.34L12,20.53C10.44,22.09 7.91,22.09 6.34,20.53L2.81,17C2.03,16.21 2.03,14.95 2.81,14.16L13.41,3.56C14.2,2.78 15.46,2.78 16.24,3.56M4.22,15.58L7.76,19.11C8.54,19.9 9.8,19.9 10.59,19.11L14.12,15.58L9.17,10.63L4.22,15.58Z" />
            </svg>
        </button>
        <button class="save-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" />
            </svg>
        </button>
    </div>
    <form>
        <div class="form-field">
            <label for="event-title">Titulo:</label>
            <input type="text" name="event-title" id="event-title">
        </div>
        <div class="form-field">
            <label for="desc">Descripción:</label>
            <textarea name="desc" id="desc" ></textarea>
        </div>
        <div class="form-field">
            <label for="date">Fecha:</label>
            <input type="date" name="date" id="date">
        </div>
        <div class="form-field">
            <label for="time">Hora:</label>
            <input type="time" name="time" id="time">
        </div>
        <div class="form-field">
            <label for="direc">Dirección:</label>
            <input type="text" name="direc" id="direc">
        </div>
        <div class="form-field">
            <label for="price">Precio:</label>
            <input type="number" name="price" id="price">
        </div>
    </form>
@endsection