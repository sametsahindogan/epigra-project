@extends('app')

@section('css')

@endsection

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Tags</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#list" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true" onclick="location.reload()">
                                            Tags List
                                        </a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#create" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                                            Create Tag
                                        </a>
                                    </li>
                                </ul>

                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="list"
                                         aria-labelledby="home-tab">
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Created Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tags as $tag)
                                                <tr>
                                                    <td><a href="{{ route('getTaggedPosts', [ $tag->id ]) }}">{{ $tag->title }} <span style="color:red;">( Click to see posts )</span></a></td>
                                                    <td>{{ $tag->created_at->toDateTimeString() }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div role="tabpanel" class="tab-pane" id="create" aria-labelledby="home-tab">

                                        <form method="POST" id="tags-form" action="{{ route('createTag') }}"
                                              data-parsley-validate class="form-horizontal form-label-left">

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                   <input type="text" class="form-control col-md-7 col-xs-12" name="title">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="submit" class="btn btn-success">Create</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('js')

    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function () {

            $('#tags-form').ajaxForm({
                beforeSubmit: function () {

                    swal({
                        title: '<i class="fa fa-spinner fa-spin" style="font-size:28px"></i>',
                        text: 'Loading, please wait...',
                        showConfirmButton: false
                    })

                },
                success: function (response) {

                    swal(
                        response.title,
                        response.content,
                        response.status
                    )

                }
            });

        });
    </script>


@endsection
