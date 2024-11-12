<div>
    <h2 class="m-0">
        Courses
    </h2>
    <p class="m-0">
        Learning often happens in classrooms but it doesn’t have to. Use {{ $settings->site_name }} to facilitate
        learning experiences no matter the context.
    </p>

    <x-danger-alert />
    <x-success-alert />

    <div class="row">
        <div class="col-12 mb-5">
            <div class="d-flex justify-content-between align-items-center">
                <div></div>
                <div>
                    <a href="{{ route('user.mycourses') }}" class="btn btn-outline-primary btn-sm">
                        My Course(s)
                    </a>
                </div>
            </div>
        </div>
        @if ($courses)
            @forelse ($courses as $item)
                <div class="col-lg-4">
                    <div class="card">
                        <a
                            href="{{ route('user.course.details', ['course' => str_replace(' ', '-', $item->course->course_title), 'id' => $item->course->id]) }}">
                            <img src="{{ str_starts_with($item->course->course_image, 'http') ? $item->course->course_image : asset('storage/app/public/' . $item->course->course_image) }}"
                                class="card-img-top" alt="course image">
                        </a>
                        <div class="card-body">
                            <a
                                href="{{ route('user.course.details', ['course' => str_replace(' ', '-', $item->course->course_title), 'id' => $item->course->id]) }}">
                                <h5 class="font-weight-bolder">{{ $item->course->course_title }}</h5>
                            </a>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-book"></i>
                                    &nbsp;
                                    <span>
                                        {{ count($item->lessons) }}
                                        {{ count($item->lessons) > 1 ? 'Lessons' : 'Lesson' }}
                                    </span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-people"></i>
                                    &nbsp;
                                    <span>
                                        {{ count($item->users) }}
                                    </span>
                                </div>
                            </div>
                            <div style="border-top: 1px dashed black;" class="my-2 px-2"></div>
                            <div class="d-flex align-items-center justify-content-between">

                                <h3 class="font-weight-bolder text-danger">
                                    {{ !$item->course->amount ? 'Free' : $settings->currency . number_format(intval($item->course->amount)) }}
                                </h3>
                                @if (in_array(auth()->user()->id, $item->usersWhoPurchased))
                                    <a href="{{ route('user.mycoursedetails', $item->course->id) }}"
                                        class="btn btn-sm btn-primary">Watch Lesson</a>
                                @else
                                    <a href="{{ route('user.course.details', ['course' => str_replace(' ', '-', $item->course->course_title), 'id' => $item->course->id]) }}"
                                        class="btn btn-sm btn-outline-primary">Get</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center py-2">
                            <p>No Data Available</p>
                        </div>
                    </div>
                </div>
            @endforelse
            <div class="col-md-12">
                {{-- {{ $courses->links() }} --}}
            </div>
            <div class="col-md-12 my-4">
                <h5 class="mb-0 h3 font-weight-400">More Lessons</h5>
            </div>
            <div class="col-12">
                @forelse ($categories as $cat)
                    @if (count($cat->lessons) > 0)
                        <div>
                            <small class="mb-0">Category</small>
                            <h2 class=" font-weight-bolder">{{ $cat->category->category }}</h2>
                        </div>
                        @foreach ($cat->lessons as $less)
                            @if ($less->category)
                                <div class="card px-3 py-2">
                                    <div>
                                        <a href="{{ route('user.learning', ['lesson' => $less->id]) }}">
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <i class="bi bi-play-circle-fill text-danger fs-2"></i>
                                                    &nbsp; &nbsp;
                                                    <div>
                                                        <h6 class="h6 m-0">{{ $less->title }}</h6>
                                                        <small
                                                            class="text-muted d-block">{{ $less->description }}</small>
                                                        <small class="text-muted">
                                                            <i class="bi bi-clock-history"></i>
                                                            {{ $less->length }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="{{ route('user.learning', ['lesson' => $less->id]) }}"
                                                        class="btn btn-info btn-sm">Watch</a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @empty
                    <div class="card text-center pt-3">
                        <p>No Data Available</p>
                    </div>
                @endforelse
            </div>
        @else
            <div class="card text-center py-5">
                <p>No Data Available</p>
            </div>
        @endif
    </div>
</div>
