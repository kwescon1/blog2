<template>
  <div class="pt-5">
    <h3 class="mb-5">{{ post_comments.length }} Comments</h3>
    <ul class="comment-list">
      <li v-for="comment in comments" :key="comment.id" class="comment">
        <div class="vcard">
          <img
            :src="`${baseUrl}/assets/frontend/images/dummyIcon.png`"
            alt="Image placeholder"
          />
        </div>
        <div class="comment-body">
          <h3>{{ comment.name }}</h3>
          <div class="meta">
            {{ comment.created_at | moment("MMMM Do YYYY, h:mm a") }}
          </div>
          <p>
            {{ comment.comment }}
          </p>
        </div>
      </li>
    </ul>
    <p v-if="showLessComments && post_comments.length > 3">
      <button
        @click="showMore"
        class="btn btn-primary btn-sm rounded px-4 py-2"
      >
        Show More
      </button>
    </p>
    <p v-if="showMoreComments">
      <button
        @click="showLess"
        class="btn btn-primary btn-sm rounded px-4 py-2"
      >
        Show Less
      </button>
    </p>

    <!-- END comment-list -->

    <div class="comment-form-wrap pt-5">
      <h3 class="mb-5">Leave a comment</h3>

      <div class="alert alert-success" v-if="comment_added">
        Commnet Successfully Added
      </div>

      <form @submit.prevent="addComment" class="p-5 bg-light">
        <div class="form-group">
          <label for="name">Name *</label>
          <input
            required
            v-model="form.name"
            type="text"
            class="form-control"
            id="name"
          />
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea
            required
            name=""
            id="message"
            cols="30"
            rows="10"
            class="form-control"
            v-model="form.comment"
          ></textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="Post Comment" class="btn btn-primary" />
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    // console.log(this.postId);
    this.form.post_id = this.postId;
    this.loadComments(this.postId);
  },

  data() {
    return {
      showMoreComments: false,
      showLessComments: true,
      comments: [],
      post_comments: [],
      comment_added: false,
      form: {
        name: "",
        comment: "",
        post_id: "",
      },
    };
  },

  methods: {
    async addComment() {
      let response = await axios.post(`${this.baseUrl}/api/comment`, this.form);

      this.comment_added = true;

      this.form.name = "";
      this.form.comment = "";
      this.loadComments(this.postId);
    },

    async loadComments(id) {
      let response = await axios.get(`${this.baseUrl}/api/${id}/comment`);

      this.post_comments = response?.data;

      this.showLess();
    },

    showMore() {
      this.showLessComments = false;
      this.showMoreComments = true;
      this.comments = this.post_comments;
    },

    showLess() {
      this.showLessComments = true;
      this.showMoreComments = false;
      this.comments = this.post_comments.slice(0, 3);
    },
  },

  computed: {
    baseUrl: function () {
      return "https://insydervoice.com";
    },

    postId: function () {
      return this.post;
    },
  },

  props: ["post"],
};
</script>

<style>
</style>