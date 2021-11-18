<template>
    <div>
        <div class="form-group">
            <label>Enter Accession No</label>
            <input
                type="text"
                name="accession_no"
                placeholder="Accession No"
                class="form-control "
                v-model="query"
                @keydown.enter.prevent="checkAcsNo()"
            />
        </div>
        <div>
            <button class="btn btn-info" @click.prevent="checkAcsNo()">
                Check
            </button>
        </div>

        <!-- {{ reload }} -->
        <div>
            <div v-if="clicked > 0">
                <div v-if="acsExists == false">
                    <p class="alert alert-danger">Invalid Accession No</p>
                </div>
                <div v-else>
                    <div v-if="reload">
                        <div v-if="issued">
                            <!-- <issue-return :issueDateProp="[issueDate, maxDays]" /> -->
                            <issue-return
                                :issueReturnProps="{
                                    issueDate,
                                    dueDate,
                                    maxDays,
                                    fineAmount
                                }"
                            />
                        </div>
                        <div v-else>
                            <issue-check-regno></issue-check-regno>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            // value ----   to get all data by storing from response.data
            query: "",
            clicked: 0,
            acsExists: "",
            issued: "",
            issueDate: "",
            dueDate: "",
            regNo: "",
            maxDays: "",
            fineAmount: "",
            reload: ""
        };
    },
    methods: {
        checkAcsNo: function() {
            // console.log(this.query);
            this.reload = false;
            var self = this;
            axios
                .get("/issue-checkAccessionNo", { params: { q: self.query } })
                .then(function(response) {
                    // res.innerHTML = JSON.stringify(response.data);
                    // self.value = response.data;
                    // self.value = Object.entries(response.data); ---  convert to array
                    // self.reload = false;
                    self.clicked++;
                    self.acsExists = response.data.acsNoExists;
                    self.issued = response.data.issued;
                    if (self.issued) {
                        self.regNo = response.data.getRegNo.registration_no;
                        self.issueDate = response.data.getRegNo.issue_date;
                        self.dueDate = response.data.getRegNo.due_date;
                        self.maxDays = response.data.memberDefaults.max_days;
                        self.fineAmount =
                            response.data.memberDefaults.fine_amount;
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
