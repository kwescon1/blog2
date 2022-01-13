<template>
  <div class="container">
    <div class="row mb-5">
      <div class="col-12">
        <h2>Recent Posts</h2>
      </div>
    </div>
    <div class="row">
      <div v-for="post in pageOfItems" :key="post.id" class="col-lg-4 mb-4">
        <div class="entry2">
          <a :href="`post/${post.slug}`"
            ><img
              alt="Image"
              class="img-fluid rounded"
              :src="`${post.image800x549}`"
          /></a>
          <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3">{{
              post.category.name
            }}</span>

            <h2>
              <a :href="`post/${post.slug}`">{{ post.title }}</a>
            </h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left">
                <img
                  :src="`${post.user.image}`"
                  alt="Image"
                  class="img-fluid"
                />
              </figure>
              <span class="d-inline-block mt-1"
                >By <a href="#">{{ post.user.name }}</a></span
              >
              <span>&nbsp;-&nbsp; {{ post.published_at }}</span>
            </div>

            <p v-html="post.content"></p>
            <p><a :href="`post/${post.slug}`">Read More</a></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row text-center pt-5 border-top">
      <div class="col-md-12">
        <div class="">
          <jw-pagination
            :items="posts"
            @changePage="onChangePage"
            :pageSize="6"
            :disableDefaultStyles="true"
            :labels="customLabels"
          ></jw-pagination>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    console.log("Component mounted.");
    this.getPosts();
  },

  methods: {
    onChangePage(pageOfItems) {
      // update page of items
      this.pageOfItems = pageOfItems;
    },

    async getPosts() {
      let response = await axios.get(`${this.baseUrl}/api/recent-posts`);

      this.posts = response?.data?.data;
    },
  },

  computed: {
    baseUrl: function () {
      return "https://insydervoice.com";
    },
  },

  data() {
    return {
      pageOfItems: [],
      posts: [],

      customLabels: {
        first: "<<",
        last: ">>",
        previous: "<",
        next: ">",
      },
    };
  },
};
</script>
