@extends('template.layout')

@section('content')
   <div class="card shadow mb-4">
       <div class="card-header py-3">
           <h6>Edit Timetable</h6>
       </div>
       <div class="card-body">
        <form action="/timetable/{{ $timetable->id }}" method="POST">
            @method('put')
            @csrf
             <div class="mb-3">
                <label for="day" class="form-label">Day</label>
                <select name="day" class="form-control form-select" id="day" value="{{ old('day', $timetable->day)}}">
                    <option selected></option>
                    <option value="senin" @if(old('type', $timetable->type) === 'Senin')  'selected' @endif>Senin</option>
                    <option value="selasa" @if(old('type', $timetable->type) === 'Selasa')  'selected' @endif>Selasa</option>
                    <option value="rabu" @if(old('type', $timetable->type) === 'Rabu')  'selected' @endif>Rabu</option>
                    <option value="kamis" @if(old('type', $timetable->type) === 'Kamis')  'selected' @endif>Kamis</option>
                    <option value="jumat" @if(old('type', $timetable->type) === 'Jumat')  'selected' @endif>Jumat</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="session" class="form-label">Session</label>
                <select name="session" class="form-control form-select" id="session" value="{{$timetable->session}}">
                    <option selected></option>
                    <option value="1, 07.00-08.00">1, 07.00-08.00</option>
                    <option value="2, 08.00-09.00">2, 08.00-09.00</option>
                    <option value="3, 09.00-10.00">3, 09.00-10.00</option>
                </select>
            </div>
            {{-- <select class="form-control" name="day">
                @if ($timetable->contact_way === "email")
                    <option value="senin" selected>senen</option>
                    <option value="selasa" >selasa</option>
                    <option value="rabu" >rabu</option>
                    <option value="kamis" >kamis</option>
                    <option value="jumat" >jumat</option>
                @else
                    <option value="senin" >senin</option>
                    <option value="selasa" >selasa</option>
                    <option value="rabu" >rabu</option>
                    <option value="kamis">kamis</option>
                    <option value="jumat">jumat</option>
                @endif
            </select>
            <select class="form-control" name="contact_way">
                @foreach(["email" => "Kontakt e-mail", "phone" => "Kontakt telefoniczny"] AS $contactWay => $contactLabel)    
                <option value="{{ $contactWay }}" {{ old("contact_way", $customer_event->contact_way) == $contactWay ? "selected" : "" }}>{{ $contactLabel }}</option>
                @endforeach
            </select> --}}
            <div class="mb-3">
                <label for="teacher_id" class="form-label">Teacher</label>
                <select name="teacher_id" class="form-control form-select" id="teacher_id">
                    @foreach ($teacher as $item)
                        @if(old ('teacher_id', $timetable->teacher_id) == $item->id)
                        <option value="{{ $item->id }}" selected>{{$item->name}}</option>
                        @else
                        <option value="{{ $item->id }}">{{$item->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="school_class_id" class="form-label">Class</label>
                <select name="school_class_id" class="form-control form-select" id="school_class_id">
                    @foreach ($class as $item)
                        @if(old ('school_class_id', $timetable->school_class_id) == $item->id)
                        <option value="{{ $item->id }}" selected>{{$item->class_name}}</option>
                        @else
                        <option value="{{ $item->id }}">{{$item->class_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary"> Submit</button>
        </form>
       </div>
   </div>
@endsection