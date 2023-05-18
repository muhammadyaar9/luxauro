<div class="slider gold-evine-slider">
    @foreach ($projects as $project)
        @php
            $total_amount = App\Models\Admin\Goldevine\GoldevineOrder::where('project_id', $project->id)->sum('total_price');
            $donations = App\Models\Admin\Goldevine\GoldevineOrder::where('project_id', $project->id)->count();
            
        @endphp
        <div>
            <a href="{{ route('projectDetail', ['id' => $project->id, 'slug' => $project->slug]) }}">
                <div class="product-item">
                    <div class="img-holder">
                        <img src="{{ $project->feature_image }}" onerror="this.src='{{ asset('images/default.png') }}'"
                            class="img-fluid">
                    </div>

                    <div class="txt-holder">
                        <strong
                            class="title text-center d-block mb-2">{{ Str::words($project->title, 2, '...') }}</strong>
                        <div class="progress rounded-0 mb-1">
                            <div class="progress-bar rounded-0" role="progressbar"
                                style="width:{{ persentage($project->id) }}%" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>${{ number_format($total_amount) }} Raised</span>
                            <span>{{ persentage($project->id) }}%</span>
                        </div>
                        <p class="mb-2">{{ donation($project->id) }} Donations</p>
                        <p class="m-0">{{ Str::words($project->short_description, 10, '...') }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
