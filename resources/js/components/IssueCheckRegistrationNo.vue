<template>
    <div>
        <div class="form-group">
            <label>Enter Registration No</label>
            <input
                type="text"
                name="registration_no"
                placeholder="Registration No"
                class="form-control"
                v-model="query"
                @keydown.enter.prevent="checkRegNo()"
            />
        </div>

        <div>
            <button class="btn btn-info" @click.prevent="checkRegNo()">
                Check Registration
            </button>
        </div>
        <!-- {{ reload }} -->

        <div v-if="clicked > 0">
            <div v-if="reload">
                <div v-if="!regNoExists">
                    <p class="alert alert-danger">Invalid registration No</p>
                </div>
                <div v-else>
                    <!-- <div v-if="reload"> -->
                    <div v-if="maxBooksIssued">
                        <p class="alert alert-danger">Max Books Issued</p>
                    </div>
                    <div v-else>
                        <issue-create :issueCreateProps="{ regNo, maxDays }" />
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            query: "",
            clicked: 0,
            regNoExists: "",
            regNo: "",
            maxBooks: "",
            maxDays: "",
            maxBooksIssued: "",
            reload: ""
        };
    },
    methods: {
        checkRegNo: function() {
            // console.log(this.query);
            this.reload = false;

            var self = this;
            axios
                .get("/issue-checkRegistrationNo", {
                    params: { q: self.query }
                })
                .then(function(response) {
                    // self.result = response.data;
                    // console.log(!response.data);
                    // self.reload = false;
                    self.clicked++;
                    self.maxBooksIssued = false;
                    self.regNoExists = response.data.regNoExists;
                    if (self.regNoExists) {
                        self.regNo = response.data.regNo.registration_no;
                        self.maxBooks = response.data.memberDefaults.max_books;
                        self.maxDays = response.data.memberDefaults.max_days;
                        self.booksIssued = response.data.booksIssued;
                        // console.log("I" + self.booksIssued);
                        // console.log("M " + self.maxBooksIssued);
                        if (self.booksIssued > self.maxBooks) {
                            self.maxBooksIssued = true;
                        }
                        // console.log("M " + self.maxBooksIssued);
                    }
                    self.reload = !self.reload;
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
};
</script>
