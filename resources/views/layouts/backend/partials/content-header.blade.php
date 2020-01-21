<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@yield("content-header", "Enter content title here")</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="@yield("breadcrumb-url", "Enter breadcrumb url here")">@yield("from-breadcrumb", "Enter main breadcrumb")</a></li>
                    <li class="breadcrumb-item active">@yield("to-breadcrumb", "Enter sub breadcrumb")</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
