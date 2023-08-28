var baseurl = $("#footer").attr("data-url");
(function () {
  window.onload = function () {
    // INIT CIRCLE 1
    var circleMenu = Circles.create({
      id: "circle-menu",
      radius: 25,
      value: $("#circle-menu").attr("data-value"),
      maxValue: 100,
      width: 3,
      text: function (value) {
        return value + "%";
      },
      colors: ["rgb(231, 234, 243)", "rgb(55, 125, 255)"],
      duration: 2000,
      isViewportInit: true,
      wrpClass: "circles-wrp",
      textClass: "circles-text text-primary",
      valueStrokeClass: "circles-valueStroke",
      maxValueStrokeClass: "circles-maxValueStroke",
      styleWrapper: true,
      styleText: true,
      textFontSize: 14,
    });

    // INIT CIRCLE 2
    var circleSubmenu = Circles.create({
      id: "circle-submenu",
      radius: 25,
      value: $("#circle-submenu").attr("data-value"),
      maxValue: 100,
      width: 3,
      text: function (value) {
        return value + "%";
      },
      colors: ["rgb(231, 234, 243)", "rgb(55, 125, 255)"],
      duration: 2000,
      isViewportInit: true,
      wrpClass: "circles-wrp",
      textClass: "circles-text text-primary",
      valueStrokeClass: "circles-valueStroke",
      maxValueStrokeClass: "circles-maxValueStroke",
      styleWrapper: true,
      styleText: true,
      textFontSize: 14,
    });

    // SAVE NEW/EDIT MENU
    $("#saveMenu").on("click", function () {
      if ($("#namaMenu").val() != "" && $("#slug-value").val() != "") {
        $(this).attr("disabled", "true");
        $(this).html("");
        $(this).append(
          'Loading... <div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        if ($(this).attr("data-action") == "new") {
          $.ajax({
            method: "post",
            url: baseurl + "superadmin/menu/ajaxaddmenu",
            data: {
              namaMenu: $("#namaMenu").val(),
              menuUrl: $("#slug-value").val(),
            },
            dataType: "JSON",
            success: function (data) {
              if (data.status == 200 && data.success == true) {
                var newMenuContentExpand =
                  '<td class="expand"><button type="button" class="btn btn-icon btn-sm btn-ghost-dark btn-submenu" data-id="' +
                  data.data.id +
                  '" data-sort="' +
                  data.data.sort +
                  '" data-show="false"><i class="bi bi-caret-right-fill"></i></button></td>';
                var newMenuContentName =
                  '<td><div class="flex-grow-1"><h5 class="text-inherit mb-0" id="menu-' +
                  data.data.id +
                  '-title">' +
                  data.data.menu +
                  ' &nbsp;&nbsp;&nbsp;<span class="badge bg-soft-secondary text-secondary">' +
                  data.data.submenu +
                  " Item</span></h5></div> </td>";
                var newMenuContentBtn =
                  '<td class="text-end"><button type="button" class="btn btn-soft-primary btn-sm btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Sub Menu"><i class="bi bi-plus-lg"></i></button>&nbsp;<button type="button" class="btn btn-soft-secondary btn-sm btn-icon btn-edit-menu" id="btn-edit-menu-' +
                  data.data.id +
                  '" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-id="' +
                  data.data.id +
                  '" data-value="' +
                  data.data.menu +
                  '"><i class="bi bi-pencil-square"></i></button>&nbsp;<button type="button" class="btn btn-soft-danger btn-sm btn-icon btn-delete-menu" id="btn-delete-menu-' +
                  data.data.id +
                  '" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" data-id="' +
                  data.data.id +
                  '"><i class="bi bi-trash3-fill"></i></button></td>';
                var newMenuContentHandler =
                  '<td><i class="bi bi-grip-vertical handle" style="font-size: 20px;" data-id="' +
                  data.data.id +
                  '"></i></td>';
                $("#menuSortable").append(
                  "<tr class='new-append' id='menuid-" +
                    data.data.id +
                    "' data-sort='" +
                    data.data.sort +
                    "'>" +
                    newMenuContentExpand +
                    newMenuContentName +
                    newMenuContentBtn +
                    newMenuContentHandler +
                    "</tr>"
                );
                $(".toast-login-bg").addClass("bg-soft-success");
                $(".toast-login-title").html("");
                $(".toast-login-title").append("Berhasil!");
                $(".toast-login-body").html("");
                $(".toast-login-body").append(data.detail);
                $(".toast-login-icon").html("");
                $(".toast-login-icon").append(
                  '<span class="icon icon-success"><i class="bi bi-check-lg"></i></span>'
                );
                $("#namaMenu").val("");
                $('[data-bs-toggle="tooltip"]').tooltip();
                $("#saveMenu").prop("disabled", false);
                $("#saveMenu").html("");
                $("#saveMenu").append("Simpan");
                $("#modalMenu").modal("hide");
                const liveToast = new bootstrap.Toast($("#liveToast"));
                liveToast.show();
              } else if (data.status == 200 && data.success == false) {
                $("#slug-domain").addClass("border border-danger text-center");
                $("#slug-value").addClass("border border-danger");
                $("#alert-slug").html("");
                $("#alert-slug").append(data.detail);
                $("#alert-slug").removeClass("d-none");
                $("#saveMenu").prop("disabled", false);
                $("#saveMenu").html("");
                $("#saveMenu").append("Simpan");
              } else {
                $("#saveMenu").prop("disabled", false);
                $("#saveMenu").html("");
                $("#saveMenu").append("Simpan");
                $("#modalMenu").modal("hide");
                $(".toast-login-bg").addClass("bg-soft-danger");
                $(".toast-login-title").html("");
                $(".toast-login-title").append("Gagal!");
                $(".toast-login-body").html("");
                $(".toast-login-body").append(data.detail);
                $(".toast-login-icon").html("");
                $(".toast-login-icon").append(
                  '<span class="icon icon-danger"><i class="bi bi-emoji-frown-fill"></i></span>'
                );
                const liveToast = new bootstrap.Toast($("#liveToast"));
                liveToast.show();
              }
            },
          });
        } else {
          // EDIT MENU
          var menuId = $(this).attr("data-id");
          var menuUrl = $("#slug-value").val();
          var countSubMenu = $("#menuid-" + menuId).attr("data-count");
          if (menuUrl != $("#btn-edit-menu-" + menuId).attr("data-slug")) {
            $.ajax({
              method: "post",
              url: baseurl + "superadmin/menu/ajaxeditmenu",
              data: {
                menuId: menuId,
                menuUrl: menuUrl,
                namaMenu: $("#namaMenu").val(),
              },
              dataType: "JSON",
              success: function (data) {
                if (data.status == 200 && data.success == true) {
                  $("#menu-" + menuId + "-title").html("");
                  $("#menu-" + menuId + "-title").append(
                    $("#namaMenu").val() +
                      '&nbsp;&nbsp;&nbsp;<span class="badge bg-soft-secondary text-secondary">' +
                      countSubMenu +
                      " Item</span>"
                  );
                  $("#btn-edit-menu-" + menuId).attr(
                    "data-value",
                    $("#namaMenu").val()
                  );
                  $("#btn-edit-menu-" + menuId).attr(
                    "data-slug",
                    data.data.slug
                  );
                  $("#menuid-" + menuId).addClass("new-append");
                  $("#saveMenu").prop("disabled", false);
                  $("#saveMenu").html("");
                  $("#saveMenu").append("Simpan");
                  $("#modal-menu-title").html("");
                  $("#modal-menu-title").append("Tambah Menu");
                  $("#namaMenu").val("");
                  $("#saveMenu").removeAttr("data-id");
                  $("#saveMenu").attr("data-action", "new");
                  $("#modalMenu").modal("hide");
                  $(".toast-login-bg").addClass("bg-soft-success");
                  $(".toast-login-title").html("");
                  $(".toast-login-title").append("Berhasil!");
                  $(".toast-login-body").html("");
                  $(".toast-login-body").append(data.detail);
                  $(".toast-login-icon").html("");
                  $(".toast-login-icon").append(
                    '<span class="icon icon-success"><i class="bi bi-check-lg"></i></span>'
                  );
                  const liveToast = new bootstrap.Toast($("#liveToast"));
                  liveToast.show();
                } else if (data.status == 200 && data.success == false) {
                  $("#slug-domain").addClass(
                    "border border-danger text-danger"
                  );
                  $("#slug-value").addClass("border border-danger");
                  $("#alert-slug").html("");
                  $("#alert-slug").append(data.detail);
                  $("#alert-slug").removeClass("d-none");
                  $("#saveMenu").prop("disabled", false);
                  $("#saveMenu").html("");
                  $("#saveMenu").append("Simpan");
                } else {
                  $("#saveMenu").prop("disabled", false);
                  $("#saveMenu").html("");
                  $("#saveMenu").append("Simpan");
                  $("#modal-menu-title").html("");
                  $("#modal-menu-title").append("Tambah Menu");
                  $("#namaMenu").val("");
                  $("#saveMenu").removeAttr("data-id");
                  $("#saveMenu").attr("data-action", "new");
                  $("#modalMenu").modal("hide");
                  $(".toast-login-bg").addClass("bg-soft-danger");
                  $(".toast-login-title").html("");
                  $(".toast-login-title").append("Gagal!");
                  $(".toast-login-body").html("");
                  $(".toast-login-body").append(data.detail);
                  $(".toast-login-icon").html("");
                  $(".toast-login-icon").append(
                    '<span class="icon icon-danger"><i class="bi bi-emoji-frown-fill"></i></span>'
                  );
                  const liveToast = new bootstrap.Toast($("#liveToast"));
                  liveToast.show();
                }
              },
            });
          } else {
            $("#slug-domain").addClass("border border-danger text-center");
            $("#slug-value").addClass("border border-danger");
            $("#alert-slug").html("");
            $("#alert-slug").append("Tidak ada perubahan!");
            $("#alert-slug").removeClass("d-none");
            $("#saveMenu").prop("disabled", false);
            $("#saveMenu").html("");
            $("#saveMenu").append("Simpan");
          }
        }
      } else {
        if ($("#namaMenu").val() == "") {
          $("#namaMenu").addClass("border border-danger");
          $("#alert-menu").removeClass("d-none");
        }
        if ($("#slug-value").val() == "") {
          $("#slug-domain").addClass("border border-danger text-danger");
          $("#slug-value").addClass("border border-danger");
          $("#alert-slug").removeClass("d-none");
        }
      }
    });

    // MANAGE DELETE MENU
    $(document).on("click", ".btn-delete-menu", function () {
      var menuId = $(this).attr("data-id");
      Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Data yang dihapus tidak bisa dikembalikan.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            method: "post",
            url: baseurl + "superadmin/menu/ajaxdeletemenu",
            data: {
              menuId: menuId,
            },
            dataType: "JSON",
            success: function (data) {
              if (data.success == true) {
                localStorage.setItem("Success", data.detail);
                window.location.reload();
              } else {
                // UPDATE CHART
                $(".toast-login-bg").addClass("bg-soft-danger");
                $(".toast-login-title").html("");
                $(".toast-login-title").append("Gagal!");
                $(".toast-login-body").html("");
                $(".toast-login-body").append(data.detail);
                $(".toast-login-icon").html("");
                $(".toast-login-icon").append(
                  '<span class="icon icon-danger"><i class="bi bi-emoji-frown-fill"></i></span>'
                );
                const liveToast = new bootstrap.Toast($("#liveToast"));
                liveToast.show();
              }
            },
          });
        }
      });
    });

    // MANAGE CLOSE BTN MODAL MENU
    $(document).on("click", ".closeSaveMenu", function () {
      $("#modal-menu-title").html("");
      $("#modal-menu-title").append("Tambah Menu");
      $("#namaMenu").val("");
      $("#slug-domain").removeClass("border border-danger text-danger");
      $("#slug-domain").addClass("text-secondary");
      $("#slug-value").val("");
      $("#slug-value").removeClass("border border-danger");
      $("#alert-slug").addClass("d-none");
      $("#saveMenu").removeAttr("data-id");
      $("#saveMenu").removeAttr("data-count");
      $("#saveMenu").attr("data-action", "new");
      $("#modalMenu").modal("hide");
    });

    // MANAGE MODAL EDIT MENU
    $(document).on("click", ".btn-edit-menu", function () {
      $("#modal-menu-title").html("");
      $("#modal-menu-title").append("Edit Menu");
      $("#namaMenu").val($(this).attr("data-value"));
      $("#slug-value").val($(this).attr("data-slug"));
      $("#saveMenu").attr("data-action", "edit");
      $("#saveMenu").attr("data-id", $(this).attr("data-id"));
      $("#saveMenu").attr("data-count", $(this).attr("data-count"));
      $("#modalMenu").modal("show");
    });

    // MANAGE MENU SORTABLE START
    new Sortable(menuSortable, {
      handle: ".handle", // handle's class
      animation: 150,
      // Changed sorting within list
      onUpdate: function (/**Event*/ evt) {
        // same properties as onEnd
        $.ajax({
          method: "post",
          url: baseurl + "superadmin/menu/ajaxsortingmenu",
          data: {
            oldIndex: evt.oldIndex,
            newIndex: evt.newIndex,
          },
          dataType: "JSON",
          success: function (data) {},
        });
      },
    });
    // MANAGE MENU SORTABLE END

    // SHOW HIDE SUBMENU START
    $(document).on("click", ".btn-submenu", function () {
      let menuId = $(this).attr("data-id");
      if ($(this).attr("data-show") == "false") {
        $(this).html("");
        $(this).append('<i class="bi bi-caret-down-fill"></i>');
        $(this).attr("data-show", "true");

        if ($("#menuid-" + menuId).attr("data-count") > 0) {
          $.ajax({
            method: "post",
            url: baseurl + "superadmin/menu/ajaxgetsubmenu",
            data: {
              menuId: menuId,
            },
            dataType: "JSON",
            success: function (data) {
              let elem = document.createElement("tr");
              elem.setAttribute("id", "menu" + menuId + "-dynamic-row");
              // elem.setAttribute("data-expand", menuId);
              let tR = document.getElementById("menuid-" + menuId);
              tR.parentNode.insertBefore(elem, tR.nextSibling);

              $("#menu" + menuId + "-dynamic-row").append(
                "<td colspan='4'><div class='collapse' id='submenu-" +
                  menuId +
                  "'><table class='table'><tbody id='submenu-" +
                  menuId +
                  "-wrapper'></tbody></div></table></td>"
              );
              for (let index = 0; index < data.length; index++) {
                var handler =
                  "<i class='bi bi-grip-vertical handle-submenu' style='font-size: 20px;' id=menu-'" +
                  menuId +
                  data[index].id +
                  "'></i>";
                var isActive;
                if (data[index].is_active == 1) {
                  isActive =
                    "<div class='form-check form-switch form-submenu'><input type='checkbox' class='form-check-input switch-activated' data-submenu-id='" +
                    data[index].id +
                    "' checked></div>";
                } else {
                  isActive =
                    "<div class='form-check form-switch form-submenu'><input type='checkbox' class='form-check-input switch-activated' data-submenu-id='" +
                    data[index].id +
                    "'></div>";
                }

                $("#submenu-" + menuId + "-wrapper").append(
                  "<tr  data-id=" +
                    menuId +
                    "-" +
                    data[index].id +
                    "><td>" +
                    handler +
                    "</td><td><i class='" +
                    data[index].icon +
                    "'></i>&nbsp;&nbsp;&nbsp;" +
                    data[index].title +
                    "</td><td><a href='" +
                    data[index].url +
                    "' target='_blank'>" +
                    data[index].url_show +
                    "</a></td><td><span class='badge bg-soft-dark text-dark'>" +
                    data[index].target +
                    "</span></td><td>" +
                    isActive +
                    "</td><td class='text-end'><button type='button' class='btn btn-soft-secondary btn-sm btn-icon btn-edit-submenu' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' submenu-id='" +
                    data[index].id +
                    "'><i class='bi bi-pencil-square'></i></button>&nbsp;<button type='button' class='btn btn-soft-danger btn-sm btn-icon btn-delete-submenu' data-bs-toggle='tooltip' data-bs-placement='top' title='Hapus' data-menuid='" +
                    menuId +
                    "' data-submenuid='" +
                    data[index].id +
                    "'><i class='bi bi-trash3-fill'></i></button></td></tr>"
                );
              }
              $("#submenu-" + menuId).collapse("show");

              // MANAGE SUBMENU SORTABLE START
              var el = document.getElementById(
                "submenu-" + menuId + "-wrapper"
              );
              new Sortable(el, {
                handle: ".handle-submenu", // handle's class
                animation: 150,
                // Changed sorting within list
                onUpdate: function (/**Event*/ evt) {
                  // same properties as onEnd
                  $.ajax({
                    method: "post",
                    url: baseurl + "superadmin/menu/ajaxsortingsubmenu",
                    data: {
                      oldIndex: evt.oldIndex,
                      newIndex: evt.newIndex,
                      menuId: menuId,
                    },
                    dataType: "JSON",
                    success: function (data) {
                      console.log(data);
                    },
                  });
                },
              });
              // MANAGE SUBMENU SORTABLE END
            },
          });
        }
      } else {
        if ($("#menuid-" + menuId).attr("data-count") > 0) {
          $("#submenu-" + menuId).collapse("hide");
          $("#menu" + menuId + "-dynamic-row").remove();
        }

        $(this).html("");
        $(this).append('<i class="bi bi-caret-right-fill"></i>');
        $(this).attr("data-show", "false");
      }
      $('[data-bs-toggle="tooltip"]').tooltip();
    });

    // MANAGE CLOSE BTN MODAL SUBMENU
    $(document).on("click", ".closeSaveSubMenu", function () {
      $("#modal-submenu-title").html("");
      $("#modal-submenu-title").append("Tambah Sub Menu");
      $("#submenunama").val("");
      $("#submenunama").removeClass("border border-danger");
      $("#alert-submenunama").addClass("d-none");
      $("#submenuiconshow").html("");
      $("#submenuiconshow").append('<i class="bi bi-alarm"></i>');
      $("#submenuiconshow").removeClass("border border-danger");
      $("#submenuicon").val("bi bi-alarm");
      $("#submenuicon").removeClass("border border-danger");
      $("#alert-submenuicon").addClass("d-none");
      $("#submenutypeinternal").prop("checked", true);
      $("#submenutypeexternal").prop("checked", false);
      $("#submenuslugwrapper").html("");
      $("#submenuslugwrapper").append(
        '<span class="input-group-text bg-soft-secondary" id="submenuurlpreview">' +
          baseurl +
          $("#hiddensubmenuslug").val() +
          '/</span> <input type="text" class="form-control form-control-light" id="submenuslug" placeholder="slug">'
      );
      $("#hiddensubmenuslug").val("");
      $("#submenuurlpreview").removeClass("border border-danger text-danger");
      $("#submenuurlpreview").addClass("text-secondary");
      $("#submenuslug").val("");
      $("#submenuslug").removeClass("border border-danger");
      $("#alert-submenuslug").addClass("d-none");
      $("#saveSubMenu").removeAttr("menu-id");
      $("#saveSubMenu").attr("data-action", "new");
      $("#saveSubMenu").prop("disabled", false);
      $("#saveSubMenu").html("");
      $("#saveSubMenu").append("Simpan");
      $("#modalSubMenu").modal("hide");
    });

    // MANAGE MODAL NEW SUBMENU
    $(document).on("click", ".btn-new-submenu", function () {
      $("#hiddensubmenuslug").val($(this).attr("data-slug"));
      $("#submenuurlpreview").html("");
      $("#submenuurlpreview").append(baseurl + $(this).attr("data-slug") + "/");
      $("#saveSubMenu").attr("menu-id", $(this).attr("menu-id"));
      $("#modalSubMenu").modal("show");
    });

    // SAVE NEW/EDIT SUBMENU
    $("#saveSubMenu").on("click", function () {
      if (
        $("#submenunama").val() != "" &&
        $("#submenuicon").val() != "" &&
        $("#submenuslug").val() != ""
      ) {
        $(this).attr("disabled", "true");
        $(this).html("");
        $(this).append(
          'Loading... <div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        if ($(this).attr("data-action") == "new") {
          var menuId = $(this).attr("menu-id");
          $.ajax({
            method: "post",
            url: baseurl + "superadmin/menu/ajaxaddsubmenu",
            data: {
              menuId: menuId,
              submenuName: $("#submenunama").val(),
              submenuIcon: $("#submenuicon").val(),
              submenuType: $('input[name="submenutype[]"]:checked').val(),
              submenuSlug: $("#submenuslug").val(),
              submenuTarget: $("input[name='submenutarget[]']:checked").val(),
            },
            dataType: "JSON",
            success: function (data) {
              localStorage.setItem("Success-add-submenu", JSON.stringify(data));
              window.location.reload();
            },
          });
        } else {
          var submenuId = $(this).attr("submenu-id");
          $.ajax({
            method: "post",
            url: baseurl + "superadmin/menu/ajaxeditsubmenu",
            data: {
              submenuId: submenuId,
              submenuName: $("#submenunama").val(),
              submenuIcon: $("#submenuicon").val(),
              submenuType: $('input[name="submenutype[]"]:checked').val(),
              submenuSlug: $("#submenuslug").val(),
              submenuTarget: $("input[name='submenutarget[]']:checked").val(),
            },
            dataType: "JSON",
            success: function (data) {
              console.log(data);
              localStorage.setItem(
                "Success-edit-submenu",
                JSON.stringify(data)
              );
              window.location.reload();
            },
          });
        }
      } else {
        if ($("#submenunama").val() == "") {
          $("#submenunama").addClass("border border-danger");
          $("#alert-submenunama").removeClass("d-none");
        }
        if ($("#submenuicon").val() == "") {
          $("#submenuiconshow").addClass("border border-danger");
          $("#submenuicon").addClass("border border-danger");
          $("#alert-submenuicon").removeClass("d-none");
        }
        if ($("#submenuslug").val() == "") {
          $("#submenuurlpreview").addClass("border border-danger");
          $("#submenuslug").addClass("border border-danger");
          $("#alert-submenuslug").removeClass("d-none");
        }
      }
    });

    // MANAGE MODAL EDIT SUBMENU
    $(document).on("click", ".btn-edit-submenu", function () {
      var submenuId = $(this).attr("submenu-id");
      $("#modalSubMenu").modal("show");
      $("#modal-submenu-title").html("");
      $("#modal-submenu-title").append("Edit Sub Menu");
      $("#saveSubMenu").attr("data-action", "edit");
      $("#saveSubMenu").attr("submenu-id", submenuId);
      $.ajax({
        method: "post",
        url: baseurl + "superadmin/menu/ajaxgetsubmenudetail",
        data: {
          submenuId: submenuId,
        },
        dataType: "JSON",
        success: function (data) {
          console.log(data);
          $("#hiddensubmenuslug").val(data.menuslug);
          $("#submenunama").val(data.title);
          $("#submenuiconshow").html("");
          $("#submenuiconshow").append('<i class="' + data.icon + '"></i>');
          $("#submenuicon").val(data.icon);
          if (data.type == "internal") {
            $("#submenutypeinternal").prop("checked", true);
            $("#submenuurlpreview").html("");
            $("#submenuurlpreview").append(baseurl + data.menuslug + "/");
          } else {
            $("#submenuurlpreview").remove();
            $("#submenutypeexternal").prop("checked", true);
          }

          $("#submenuslug").val(data.url);
          if (data.target == "_self") {
            $("#submenutargetself").prop("checked", true);
          } else {
            $("#submenutargetblank").prop("checked", true);
          }
        },
      });
    });

    // MANAGE MODAL SUBMENU SWITCH URL TYPE
    $(document).on("change", "input[name='submenutype[]']", function () {
      if ($(this).val() == 0) {
        $("#submenuslugwrapper").html("");
        $("#submenuslugwrapper").append(
          '<span class="input-group-text bg-soft-secondary" id="submenuurlpreview">' +
            baseurl +
            $("#hiddensubmenuslug").val() +
            '/</span> <input type="text" class="form-control form-control-light" id="submenuslug" placeholder="slug">'
        );
      } else {
        $("#submenuslugwrapper").html("");
        $("#submenuslugwrapper").append(
          '<input type="text" class="form-control form-control-light" id="submenuslug" placeholder="https://">'
        );
      }
      $("#alert-submenuslug").addClass("d-none");
    });

    // MANAGE SWITC BTN ACTIVATED SUBMENU
    $(document).on("click", ".switch-activated", function () {
      var subMenuId = $(this).attr("data-submenu-id");
      var activeSwitch = $('input[data-submenu-id="' + subMenuId + '"]').prop(
        "checked"
      );
      $.ajax({
        method: "post",
        url: baseurl + "superadmin/menu/ajaxswitchsubmenu",
        data: {
          subMenuId: subMenuId,
          activeSwitch: activeSwitch,
        },
        dataType: "JSON",
        success: function (data) {
          $("#count-submenu-active").html("");
          $("#count-submenu-active").append(data.submenu_active + " Aktif");
          circleSubmenu.update(data.submenu_percent);
        },
      });
    });

    // MANAGE DELETE SUBMENU
    $(document).on("click", ".btn-delete-submenu", function () {
      var submenuId = $(this).attr("data-submenuid");
      Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Data yang dihapus tidak bisa dikembalikan.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            method: "post",
            url: baseurl + "superadmin/menu/ajaxdeletesubmenu",
            data: {
              submenuId: submenuId,
            },
            dataType: "JSON",
            success: function (data) {
              if (data.success == true) {
                localStorage.setItem("Success-delete-submenu", data.detail);
                window.location.reload();
              } else {
                // UPDATE CHART
                $(".toast-login-bg").addClass("bg-soft-danger");
                $(".toast-login-title").html("");
                $(".toast-login-title").append("Gagal!");
                $(".toast-login-body").html("");
                $(".toast-login-body").append(data.detail);
                $(".toast-login-icon").html("");
                $(".toast-login-icon").append(
                  '<span class="icon icon-danger"><i class="bi bi-emoji-frown-fill"></i></span>'
                );
                const liveToast = new bootstrap.Toast($("#liveToast"));
                liveToast.show();
              }
            },
          });
        }
      });
    });
  };
})();

// MANAGE SESSION
$(function () {
  if (localStorage.getItem("Success")) {
    $(".toast-login-bg").addClass("bg-soft-success");
    $(".toast-login-title").html("");
    $(".toast-login-title").append("Berhasil!");
    $(".toast-login-body").html("");
    $(".toast-login-body").append("Menu berhasil dihapus!");
    $(".toast-login-icon").html("");
    $(".toast-login-icon").append(
      '<span class="icon icon-success"><i class="bi bi-check-lg"></i></span>'
    );
    const liveToast = new bootstrap.Toast($("#liveToast"));
    liveToast.show();
    localStorage.clear();
  }
  if (localStorage.getItem("switchSubMenu")) {
    alert(localStorage.getItem("switchSubMenu"));
    localStorage.clear();
  }
  if (localStorage.getItem("Success-delete-submenu")) {
    $(".toast-login-bg").addClass("bg-soft-success");
    $(".toast-login-title").html("");
    $(".toast-login-title").append("Berhasil!");
    $(".toast-login-body").html("");
    $(".toast-login-body").append("Sub Menu berhasil dihapus!");
    $(".toast-login-icon").html("");
    $(".toast-login-icon").append(
      '<span class="icon icon-success"><i class="bi bi-check-lg"></i></span>'
    );
    const liveToast = new bootstrap.Toast($("#liveToast"));
    liveToast.show();
    localStorage.clear();
  }
  if (localStorage.getItem("Success-add-submenu")) {
    var dataSet = JSON.parse(localStorage.getItem("Success-add-submenu"));
    let menuId = dataSet.data.menu_id;
    $("#switchermenu-menuId").attr("data-show", "true");
    $("#switchermenu-menuId").html("");
    $("#switchermenu-menuId").append('<i class="bi bi-caret-right-fill"></i>');
    if ($("#menuid-" + menuId).attr("data-count") > 0) {
      $.ajax({
        method: "post",
        url: baseurl + "superadmin/menu/ajaxgetsubmenu",
        data: {
          menuId: menuId,
        },
        dataType: "JSON",
        success: function (data) {
          let elem = document.createElement("tr");
          elem.setAttribute("id", "menu" + menuId + "-dynamic-row");
          // elem.setAttribute("data-expand", menuId);
          let tR = document.getElementById("menuid-" + menuId);
          tR.parentNode.insertBefore(elem, tR.nextSibling);
          $("#menu" + menuId + "-dynamic-row").append(
            "<td colspan='4'><div class='collapse' id='submenu-" +
              menuId +
              "'><table class='table'><tbody id='submenu-" +
              menuId +
              "-wrapper'></tbody></div></table></td>"
          );
          for (let index = 0; index < data.length; index++) {
            var handler =
              "<i class='bi bi-grip-vertical handle-submenu' style='font-size: 20px;' id=menu-'" +
              menuId +
              data[index].id +
              "'></i>";
            var isActive;
            if (data[index].is_active == 1) {
              isActive =
                "<div class='form-check form-switch form-submenu'><input type='checkbox' class='form-check-input switch-activated' data-submenu-id='" +
                data[index].id +
                "' checked></div>";
            } else {
              isActive =
                "<div class='form-check form-switch form-submenu'><input type='checkbox' class='form-check-input switch-activated' data-submenu-id='" +
                data[index].id +
                "'></div>";
            }
            if (dataSet.data.id == data[index].id) {
              $("#submenu-" + menuId + "-wrapper").append(
                "<tr class='new-append' data-id=" +
                  menuId +
                  "-" +
                  data[index].id +
                  "><td>" +
                  handler +
                  "</td><td><i class='" +
                  data[index].icon +
                  "'></i>&nbsp;&nbsp;&nbsp;" +
                  data[index].title +
                  "</td><td><a href='" +
                  data[index].url +
                  "' target='_blank'>" +
                  data[index].url_show +
                  "</a></td><td><span class='badge bg-soft-dark text-dark'>" +
                  data[index].target +
                  "</span></td><td>" +
                  isActive +
                  "</td><td class='text-end'><button type='button' class='btn btn-soft-secondary btn-sm btn-icon btn-edit-submenu' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' submenu-id='" +
                  data[index].id +
                  "'><i class='bi bi-pencil-square'></i></button>&nbsp;<button type='button' class='btn btn-soft-danger btn-sm btn-icon btn-delete-submenu' data-bs-toggle='tooltip' data-bs-placement='top' title='Hapus' data-menuid='" +
                  menuId +
                  "' data-submenuid='" +
                  data[index].id +
                  "'><i class='bi bi-trash3-fill'></i></button></td></tr>"
              );
            } else {
              $("#submenu-" + menuId + "-wrapper").append(
                "<tr  data-id=" +
                  menuId +
                  "-" +
                  data[index].id +
                  "><td>" +
                  handler +
                  "</td><td><i class='" +
                  data[index].icon +
                  "'></i>&nbsp;&nbsp;&nbsp;" +
                  data[index].title +
                  "</td><td><a href='" +
                  data[index].url +
                  "' target='_blank'>" +
                  data[index].url_show +
                  "</a></td><td><span class='badge bg-soft-dark text-dark'>" +
                  data[index].target +
                  "</span></td><td>" +
                  isActive +
                  "</td><td class='text-end'><button type='button' class='btn btn-soft-secondary btn-sm btn-icon' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit'><i class='bi bi-pencil-square'></i></button>&nbsp;<button type='button' class='btn btn-soft-danger btn-sm btn-icon btn-delete-submenu' data-bs-toggle='tooltip' data-bs-placement='top' title='Hapus' data-menuid='" +
                  menuId +
                  "' data-submenuid='" +
                  data[index].id +
                  "'><i class='bi bi-trash3-fill'></i></button></td></tr>"
              );
            }
          }
          $("#submenu-" + menuId).collapse("show");
          // MANAGE SUBMENU SORTABLE START
          var el = document.getElementById("submenu-" + menuId + "-wrapper");
          new Sortable(el, {
            handle: ".handle-submenu", // handle's class
            animation: 150,
            // Changed sorting within list
            onUpdate: function (/**Event*/ evt) {
              // same properties as onEnd
              $.ajax({
                method: "post",
                url: baseurl + "superadmin/menu/ajaxsortingsubmenu",
                data: {
                  oldIndex: evt.oldIndex,
                  newIndex: evt.newIndex,
                  menuId: menuId,
                },
                dataType: "JSON",
                success: function (data) {
                  console.log(data);
                },
              });
            },
          });
          // MANAGE SUBMENU SORTABLE END
        },
      });
    }
    $('[data-bs-toggle="tooltip"]').tooltip();
    $(".toast-login-bg").addClass("bg-soft-success");
    $(".toast-login-title").html("");
    $(".toast-login-title").append("Berhasil!");
    $(".toast-login-body").html("");
    $(".toast-login-body").append("Berhasil menyimpan Sub Menu!");
    $(".toast-login-icon").html("");
    $(".toast-login-icon").append(
      '<span class="icon icon-success"><i class="bi bi-check-lg"></i></span>'
    );
    const liveToast = new bootstrap.Toast($("#liveToast"));
    liveToast.show();
    localStorage.clear();
  }
  if (localStorage.getItem("Success-edit-submenu")) {
    var dataSet = JSON.parse(localStorage.getItem("Success-edit-submenu"));
    console.log(dataSet);
    localStorage.clear();
    let menuId = dataSet.data.menu_id;
    $("#switchermenu-menuId").attr("data-show", "true");
    $("#switchermenu-menuId").html("");
    $("#switchermenu-menuId").append('<i class="bi bi-caret-right-fill"></i>');
    if ($("#menuid-" + menuId).attr("data-count") > 0) {
      $.ajax({
        method: "post",
        url: baseurl + "superadmin/menu/ajaxgetsubmenu",
        data: {
          menuId: menuId,
        },
        dataType: "JSON",
        success: function (data) {
          let elem = document.createElement("tr");
          elem.setAttribute("id", "menu" + menuId + "-dynamic-row");
          // elem.setAttribute("data-expand", menuId);
          let tR = document.getElementById("menuid-" + menuId);
          tR.parentNode.insertBefore(elem, tR.nextSibling);
          $("#menu" + menuId + "-dynamic-row").append(
            "<td colspan='4'><div class='collapse' id='submenu-" +
              menuId +
              "'><table class='table'><tbody id='submenu-" +
              menuId +
              "-wrapper'></tbody></div></table></td>"
          );
          for (let index = 0; index < data.length; index++) {
            var handler =
              "<i class='bi bi-grip-vertical handle-submenu' style='font-size: 20px;' id=menu-'" +
              menuId +
              data[index].id +
              "'></i>";
            var isActive;
            if (data[index].is_active == 1) {
              isActive =
                "<div class='form-check form-switch form-submenu'><input type='checkbox' class='form-check-input switch-activated' data-submenu-id='" +
                data[index].id +
                "' checked></div>";
            } else {
              isActive =
                "<div class='form-check form-switch form-submenu'><input type='checkbox' class='form-check-input switch-activated' data-submenu-id='" +
                data[index].id +
                "'></div>";
            }
            if (dataSet.data.id == data[index].id) {
              $("#submenu-" + menuId + "-wrapper").append(
                "<tr class='new-append' data-id=" +
                  menuId +
                  "-" +
                  data[index].id +
                  "><td>" +
                  handler +
                  "</td><td><i class='" +
                  data[index].icon +
                  "'></i>&nbsp;&nbsp;&nbsp;" +
                  data[index].title +
                  "</td><td><a href='" +
                  data[index].url +
                  "' target='_blank'>" +
                  data[index].url_show +
                  "</a></td><td><span class='badge bg-soft-dark text-dark'>" +
                  data[index].target +
                  "</span></td><td>" +
                  isActive +
                  "</td><td class='text-end'><button type='button' class='btn btn-soft-secondary btn-sm btn-icon btn-edit-submenu' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit' submenu-id='" +
                  data[index].id +
                  "'><i class='bi bi-pencil-square'></i></button>&nbsp;<button type='button' class='btn btn-soft-danger btn-sm btn-icon btn-delete-submenu' data-bs-toggle='tooltip' data-bs-placement='top' title='Hapus' data-menuid='" +
                  menuId +
                  "' data-submenuid='" +
                  data[index].id +
                  "'><i class='bi bi-trash3-fill'></i></button></td></tr>"
              );
            } else {
              $("#submenu-" + menuId + "-wrapper").append(
                "<tr  data-id=" +
                  menuId +
                  "-" +
                  data[index].id +
                  "><td>" +
                  handler +
                  "</td><td><i class='" +
                  data[index].icon +
                  "'></i>&nbsp;&nbsp;&nbsp;" +
                  data[index].title +
                  "</td><td><a href='" +
                  data[index].url +
                  "' target='_blank'>" +
                  data[index].url_show +
                  "</a></td><td><span class='badge bg-soft-dark text-dark'>" +
                  data[index].target +
                  "</span></td><td>" +
                  isActive +
                  "</td><td class='text-end'><button type='button' class='btn btn-soft-secondary btn-sm btn-icon' data-bs-toggle='tooltip' data-bs-placement='top' title='Edit'><i class='bi bi-pencil-square'></i></button>&nbsp;<button type='button' class='btn btn-soft-danger btn-sm btn-icon btn-delete-submenu' data-bs-toggle='tooltip' data-bs-placement='top' title='Hapus' data-menuid='" +
                  menuId +
                  "' data-submenuid='" +
                  data[index].id +
                  "'><i class='bi bi-trash3-fill'></i></button></td></tr>"
              );
            }
          }
          $("#submenu-" + menuId).collapse("show");
          // MANAGE SUBMENU SORTABLE START
          var el = document.getElementById("submenu-" + menuId + "-wrapper");
          new Sortable(el, {
            handle: ".handle-submenu", // handle's class
            animation: 150,
            // Changed sorting within list
            onUpdate: function (/**Event*/ evt) {
              // same properties as onEnd
              $.ajax({
                method: "post",
                url: baseurl + "superadmin/menu/ajaxsortingsubmenu",
                data: {
                  oldIndex: evt.oldIndex,
                  newIndex: evt.newIndex,
                  menuId: menuId,
                },
                dataType: "JSON",
                success: function (data) {
                  console.log(data);
                },
              });
            },
          });
          // MANAGE SUBMENU SORTABLE END
        },
      });
    }
    $('[data-bs-toggle="tooltip"]').tooltip();
    $(".toast-login-bg").addClass("bg-soft-success");
    $(".toast-login-title").html("");
    $(".toast-login-title").append("Berhasil!");
    $(".toast-login-body").html("");
    $(".toast-login-body").append(dataSet.data.detail);
    $(".toast-login-icon").html("");
    $(".toast-login-icon").append(
      '<span class="icon icon-success"><i class="bi bi-check-lg"></i></span>'
    );
    const liveToast = new bootstrap.Toast($("#liveToast"));
    liveToast.show();
  }
});

// ICON PICKER
(async () => {
  const response = await fetch(
    baseurl + "assets/vendor/iconpicker/dist/iconsets/bootstrap5.json"
  );
  const result = await response.json();

  const iconpicker = new Iconpicker(document.querySelector(".iconpicker"), {
    icons: result,
    showSelectedIn: document.querySelector(".selected-icon"),
    searchable: true,
    selectedClass: "selected",
    containerClass: "my-picker",
    hideOnSelect: true,
    fade: true,
    defaultValue: "bi-alarm",
    valueFormat: (val) => `bi ${val}`,
  });

  iconpicker.set(); // Set as empty
  iconpicker.set("bi-alarm"); // Reset with a value
})();
