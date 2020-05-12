<template>
  <div id="tag">
    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
      <div class="container-fluid">
        <div class="page-header-content">
          <h1 class="page-header-title">
            <div class="page-header-icon">
              <i data-feather="activity"></i>
            </div>
            <span>Tag</span>
          </h1>
          <div class="page-header-subtitle">All Tag content you can get here.</div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-n10">
      <div class="card mb-4">
        <div class="card-header">
          <div class="mr-2">
            <strong>Tag Table</strong>
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
                  <th>Tag Name</th>
                  <th>Create Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(tag, i) in tags" :key="i">
                  <td>{{tag.id}}</td>
                  <td>{{tag.tagName}}</td>
                  <td>{{tag.created_at}}</td>
                  <td>
                    <Button type="info" size="small" @click="showEditModal(tag)">Edit</Button>
                    <Button type="error" size="small" @click="showDeleteModal(tag.id)">Delete</Button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Adding Tag -->
      <Modal v-model="addModal" title="Add New Tag" :mask-closable="false">
        <Input v-model="data.tagName" placeholder="Add Tag" style="width: 100%" />
        <span class="text-danger" v-if="errors.tagName">{{errors.tagName[0]}}</span>
        <div slot="footer">
          <Button type="default" @click="addModal = false">Close</Button>
          <Button
            type="primary"
            @click="addTag"
            :disabled="isAdding"
            :loading="isAdding"
          >{{isAdding ? 'Adding...' : 'Add Tag'}}</Button>
        </div>
      </Modal>

      <!-- Editing Tag -->
      <Modal v-model="editModal" title="Edit Tag" :mask-closable="false">
        <Input v-model="editData.tagName" placeholder="Edit Tag" style="width: 100%" />
        <span class="text-danger" v-if="errors.tagName">{{errors.tagName[0]}}</span>
        <div slot="footer">
          <Button type="default" @click="editModal = false">Close</Button>
          <Button
            type="primary"
            @click="editTag"
            :disabled="isAdding"
            :loading="isAdding"
          >{{isAdding ? 'Adding...' : 'Edit Tag'}}</Button>
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
          <Button type="error" size="large" @click="deleteTag(deleteItem)">Delete</Button>
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
        tagName: ""
      },
      addModal: false,
      editModal: false,
      isAdding: false,
      deleteModal: false,
      deleteItem: {},
      tags: [],
      errors: [],
      editData: {
        tagName: ""
      }
    };
  },
  methods: {
    async loadData() {
      const res = await this.callApi("get", "api/tag");
      if (res.status == 200) {
        this.tags = res.data;
      } else {
        this.error();
      }
    },
    async addTag() {
      /* if (this.data.tagName.trim() == "") {
        return this.error("Tag Name is Required");
      } */
      const res = await this.callApi("post", "api/tag", this.data);
      if (res.status === 201) {
        this.tags.unshift(res.data);
        this.success("Tag Added Successfully");
        this.data = "";
        this.addModal = false;
      } else {
        if (res.status === 422) {
          this.errors = res.data.errors;
          this.someerror();
        }
      }
    },
    showEditModal(tag) {
      this.editModal = true;
      this.editData = tag;
    },
    showDeleteModal(id) {
      this.deleteModal = true;
      this.deleteItem = id;
    },
    async editTag() {
      /* if (this.data.tagName.trim() == "") {
        return this.error("Tag Name is Required");
      } */
      const res = await this.callApi(
        "put",
        "api/tag/" + this.editData.id,
        this.editData
      );
      if (res.status === 200) {
        this.success("Tag Updated Successfully");
        this.editdata = "";
        this.editModal = false;
      } else {
        if (res.status === 422) {
          this.errors = res.data.errors;
          this.someerror();
        }
      }
    },
    async deleteTag(deleteItem) {
      const res = await this.callApi("delete", "api/tag/" + deleteItem);
      if (res.status === 200) {
        this.deleteModal = false;
        this.success("Tag Delete Successfully");
        Fire.$emit("autoLoadData");
      } else {
        if (res.status === 422) {
          this.errors = res.data.errors;
          this.someerror();
        }
      }
    }
  },

  created() {
    this.loadData();
    Fire.$on("autoLoadData", () => {
      this.loadData();
    });
  }
};
</script>
