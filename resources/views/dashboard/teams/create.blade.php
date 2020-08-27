@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Create team</div>
        <form action={{ route('teams.store') }} method="post" id="createTeamForm">
          <div class="card-body">
            @csrf
            <div class="form-group">
              <label>Team name</label>
              <input name="group_name" class="form-control" required>
            </div>

            <div>
              <h4>Team Members</h4>
              <table id="memberTable" class="table table-responsive-sm table-bordered" @empty($members[0])
                style="border:none;" @endempty>
                @forelse ($members as $member)
                  <tr>
                    <th>{{ $member->group_name }}</th>
                    <th style="width:50px; text-align:center; background:orange;">
                      <i class="cil-trash" onclick="removeMember({{ $member->id }}, this)"
                        style="font-size: 18px; cursor: pointer;"></i>
                    </th>
                  </tr>
                @empty
                  <tr>
                    <td style="border: none; color: gray; padding-top:0;">No team members</td>
                  </tr>
                @endforelse
              </table>
              <input type="hidden" name="members" id="members" value="">
            </div>

            <div>
              <div class="form-group">
                <label>Search user by email</label>
                <input class="form-control" id="emailsearch" type="email">
              </div>
              <button class="btn btn-lg btn-info" id="userbyemail" style="width: 100%"> Search user
              </button>
              <br><br>
            </div>

            <p>Select an user in search results</p>
            <table class="table table-responsive-sm table-bordered" id="searchres">

            </table>

            <div class="form-group">
              <label>Team admin</label>
              <select name="corporate_id" class="form-control form-control-lg" id="Timeframe">
                @foreach ($admins as $admin)
                  <option value="{{ $admin->id }}"> {{ $admin->first_name }} {{ $admin->last_name }} </option>
                @endforeach
              </select>
            </div>

          </div>
          <div class="card-footer">
            <button class="btn btn-lg btn-success" type="submit" style="width: 100%"> Create Team </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('javascript')
<script>
  $("#userbyemail").click(function() {
    event.preventDefault();
    var email = $("#emailsearch").val();
    console.log(email);
    $.get("/administration/teams/searchUser?email=" + email, function(res) {
      console.log(res);
      var searchres = "";
      res.forEach(user => {
        searchres += `
          <tr>
            <th>
              ${user.first_name} ${user.last_name}
            </th>
            <td onclick="addTeamMember(${user.id}, '${user.first_name} ${user.last_name}')"
              style="width: 120px; text-align:center; background: green; color: white; cursor: pointer">
              Add
            </td>
          </tr>
        `;
      });
      $("#searchres").html(searchres);
    }, 'json');

  });

  function addTeamMember(userid, name) {
    console.log(userid)


    var originVal = $("#members").val();

    if ((originVal + ",").indexOf(userid + ",") != -1) {
      return;
    }

    var add = "";
    if (originVal[originVal.length - 1] == "," || originVal.length == 0) {
      add = userid;
    } else {
      add = "," + userid;
    }
    $("#members").val(originVal + add);

    var row = `<tr>
                <th>${name}</th>
                <th style="width:50px; text-align:center; background:orange;">
                  <i onclick="removeMember(${userid}, this)" class="cil-trash" style="font-size: 18px; cursor: pointer;"></i>
                </th>
              </tr>`;

    $("#memberTable").append(row);
    console.log("addTeamMember", originVal, add)
  }

  function removeMember(userid, self) {
    $(self).parent().parent().remove();
    var originVal = $("#members").val() + ",";
    var res = originVal.replace(userid + ",", "");
    if (res[res.length - 1] == ",") {
      console.log('beforeres', res)
      res = res.slice(0, res.length - 1);
      console.log('afterres', res)
    }
    $("#members").val(res);
  }

</script>
@endsection
