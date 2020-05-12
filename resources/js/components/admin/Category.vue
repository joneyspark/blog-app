<template>
  <div id="tag">
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
        <div class="page-header-content">
          <h1 class="page-header-title">
            <div class="page-header-icon">
              <i data-feather="activity"></i>
            </div>
            <span>Category</span>
          </h1>
          <div class="page-header-subtitle">All Category content you can get here.</div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-n10">
      <div class="card mb-4">
        <div class="card-header">
          <div class="mr-2">
            <strong>Category</strong>
          </div>
          <!-- Button trigger modal -->
          <div>
            <Button type="info" @click="addModal = true">Add New +</Button>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category Name</th>
                  <th>Category Image</th>
                  <th>Create Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(category, i) in categories" :key="i">
                  <td>{{category.id}}</td>
                  <td>{{category.categoryName}}</td>
                  <td>
                    <img class="table-icon-img" :src="`${category.iconImage}`" alt />
                  </td>
                  <td>{{category.created_at}}</td>
                  <td>
                    <Button type="info" size="small" @click="showEditModal(category)">Edit</Button>
                    <Button type="error" size="small" @click="showDeleteModal(category.id)">Delete</Button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Adding Category -->
      <Modal v-model="addModal" title="Add New Category" :mask-closable="false">
        <Input v-model="data.categoryName" placeholder="Add Category" style="width: 100%" />
        <span class="text-danger" v-if="errors.categoryName">{{errors.categoryName[0]}}</span>
        <div class="mt-2"></div>
        <Upload
          type="drag"
          ref="upload"
          :headers="{'x-csrf-token' : token, 'X-Requested-With' : 'XMLHttpRequest'}"
          :on-success="handleSuccess"
          :format="['jpg','jpeg','png','webp','gif','bmp']"
          :on-format-error="handleFormatError"
          :on-error="handleError"
          :max-size="2048"
          :on-exceeded-size="handleMaxSize"
          action="api/categoryImage"
        >
          <div style="padding: 20px 0">
            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
            <p>Click or drag files here to upload</p>
          </div>
        </Upload>
        <span class="text-danger" v-if="errors.iconImage">{{errors.iconImage[0]}}</span>
        <div class="image_thumb img-responsive" v-if="data.iconImage">
          <img class="img-responsive" style="max-width:100%" :src="`${data.iconImage}`" alt />
          <div class="demo-upload-list-cover">
            <Icon type="ios-trash-outline" @click="deleteImage"></Icon>
          </div>
        </div>
        <div slot="footer">
          <Button type="default" @click="addModal = false">Close</Button>
          <Button
            type="primary"
            @click="addCategory"
            :disabled="isAdding"
            :loading="isAdding"
          >{{isAdding ? 'Adding...' : 'Add Category'}}</Button>
        </div>
      </Modal>

      <!-- Editing Category -->
      <Modal v-model="editModal" title="Edit Category" :mask-closable="false">
        <Input v-model="editData.categoryName" placeholder="Edit Category" style="width: 100%" />
        <span class="text-danger" v-if="errors.categoryName">{{errors.categoryName[0]}}</span>
        <div class="mt-2"></div>
        <Upload
          v-show="isIconImageNew"
          type="drag"
          ref="editUpload"
          :headers="{'x-csrf-token' : token, 'X-Requested-With' : 'XMLHttpRequest'}"
          :on-success="handleSuccess"
          :format="['jpg','jpeg','png','webp','gif','bmp']"
          :on-format-error="handleFormatError"
          :on-error="handleError"
          :max-size="2048"
          :on-exceeded-size="handleMaxSize"
          action="api/categoryImage"
        >
          <div style="padding: 20px 0">
            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
            <p>Click or drag files here to upload</p>
          </div>
        </Upload>
        <span class="text-danger" v-if="errors.iconImage">{{errors.iconImage[0]}}</span>
        <div class="image_thumb img-responsive" v-if="editData.iconImage">
          <img class="img-responsive" style="max-width:100%" :src="`${editData.iconImage}`" alt />
          <div class="demo-upload-list-cover">
            <Icon type="ios-trash-outline" @click="deleteImage(false)"></Icon>
          </div>
        </div>

        <div slot="footer">
          <Button type="default" @click="closeEditModal">Close</Button>
          <Button
            type="primary"
            @click="editCategory"
            :disabled="isAdding"
            :loading="isAdding"
          >{{isAdding ? 'Adding...' : 'Edit Category'}}</Button>
        </div>
      </Modal>

      <!-- Delete Modal -->

      <Modal v-model="deleteModal" width="360">
        <p slot="header" style="color:#f60;text-align:center">
          <Icon type="ios-information-circle"></Icon>
          <span>Delete confirmation</span>
        </p>
        <div style="text-align:center">
          <p>After you confirmation this item will be deleted. so check carefuly!</p>
          <p>Will you delete it?</p>
        </div>
        <div slot="footer">
          <Button type="error" size="large" @click="deleteCategory(deleteItem)">Delete</Button>
        </div>
      </Modal>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: {
        categoryName: "",
        iconImage: ""
      },
      addModal: false,
      editModal: false,
      isAdding: false,
      deleteModal: false,
      deleteItem: {},
      categories: [],
      errors: [],
      editData: {
        categoryName: "",
        iconImage: ""
      },
      token: "",
      isIconImageNew: false,
      isEditingItem: false
    };
  },
  methods: {
    async loadData() {
      const res = await this.callApi("get", "api/category");
      if (res.status == 200) {
        this.categories = res.data;
      } else {
        this.error();
      }
    },
    async addCategory() {
      /* if (this.data.tagName.trim() == "") {
        return this.error("Tag Name is Required");
      } */
      this.data.iconImage = `${this.data.iconImage}`;
      const res = await this.callApi("post", "api/category", this.data);
      if (res.status === 201) {
        this.categories.unshift(res.data);
        this.success("Category Added Successfully");
        this.data = "";
        this.addModal = false;
      } else {
        if (res.status === 422) {
          if (res.data.errors.categoryName) {
            this.errors = res.data.errors;
            this.error(res.data.errors.categoryName[0]);
          }
          if (res.data.errors.iconImage) {
            this.errors = res.data.errors;
            this.error(res.data.errors.iconImage[0]);
          }
        } else {
          this.someerror();
        }
      }
    },
    showEditModal(category) {
      this.editModal = true;
      this.editData = category;
      this.isEditingItem = true;
    },
    closeEditModal(category) {
      this.editModal = false;
      this.isEditingItem = false;
    },

    showDeleteModal(id) {
      this.deleteModal = true;
      this.deleteItem = id;
    },
    async editCategory() {
      /* if (this.data.tagName.trim() == "") {
        return this.error("Tag Name is Required");
      } */
      this.editData.iconImage = `${this.editData.iconImage}`;
      const res = await this.callApi("put", "api/category/"+this.editData.id, this.editData);
      if (res.status === 200) {
        this.categories.unshift(res.data);
        this.success("Category Updated Successfully");
        this.editData = "";
        this.editModal = false;
      } else {
        if (res.status === 422) {
          if (res.data.errors.categoryName) {
            this.errors = res.data.errors;
            this.error(res.data.errors.categoryName[0]);
          }
          if (res.data.errors.iconImage) {
            this.errors = res.data.errors;
            this.error(res.data.errors.iconImage[0]);
          }
        } else {
          this.someerror();
        }
      }
    },
    async deleteCategory(deleteItem) {
      const res = await this.callApi("delete", "api/category/" + deleteItem);
      if (res.status === 200) {
        this.deleteModal = false;
        this.success("Category Delete Successfully");
        Fire.$emit("autoLoadData");
      } else {
        if (res.status === 422) {
          this.errors = res.data.errors;
          this.someerror();
        }
      }
    },
    handleView(name) {
      this.imgName = name;
      this.visible = true;
    },
    handleRemove(file) {
      const fileList = this.$refs.upload.fileList;
      this.$refs.upload.fileList.splice(fileList.indexOf(file), 1);
    },
    handleSuccess(res, file) {
      res = `/admin/images/category/${res}`;
      if (this.isEditingItem) {
        return (this.editData.iconImage = res);
      }
      this.data.iconImage = res;
    },
    handleError(res, file) {
      /* console.log('res', res);
        console.log('file', file);
        if(res.status === 422){
            let file_error = file.errors.file[0];
            this.error(file_error);
        } */
      this.$Notice.warning({
        title: "The file format is incorrect",
        desc: `${
          file.errors.file.length
            ? file.errors.file[0]
            : "Something went wrong!"
        }`
      });
    },
    handleFormatError(file) {
      this.$Notice.warning({
        title: "The file format is incorrect",
        desc:
          "File format of " +
          file.name +
          " is incorrect, please select jpg or png."
      });
    },
    handleMaxSize(file) {
      this.$Notice.warning({
        title: "Exceeding file size limit",
        desc: "File  " + file.name + " is too large, no more than 2M."
      });
    },
    async deleteImage(isAdd = true) {
      let image;
      if(!isAdd){
        this.isIconImageNew = true;
        image = this.editData.iconImage;
        this.editData.iconImage = "";
        this.$refs.editUpload.clearFiles();
      }else{
        image = this.data.iconImage;
        this.data.iconImage = "";
        this.$refs.upload.clearFiles();
      }
      const res = await this.callApi("post", "api/deletecategoryImage", {
        imageName: image
      });

      if (res.status != 200) {
        this.data.iconImage = image;
        this.swr();
      }
    }
  },

  created() {
    this.token = window.Laravel.csrfToken;
    this.loadData();
    Fire.$on("autoLoadData", () => {
      this.loadData();
    });
  }
};
</script>
