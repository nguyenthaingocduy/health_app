

@include('backend.dashboard.component.breadcrumb', ['title' => $config ['seo']['index']['tableHeading']])
<div class="row mt20">
<div class="col-lg-12 ">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>{{ $config['seo']['index']['tableHeading']}}</h5>
            @include('backend.post.component.toolbox')
        </div>
        <div class="ibox-content">
            @include('backend.post.post.component.filter')
            @include('backend.post.post.component.table')
        </div>
    </div>
</div>

