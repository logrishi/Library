<template>
    <div>
        <div>
            <div class="form-group">
                <label>Issue Date</label>
                <input
                    type="text"
                    class="form-control date-picker"
                    name="issue_date"
                    id="issue_date"
                />
            </div>
        </div>
        <!-- {{ myProps }} -->
        <div>
            <div class="form-group">
                <label>Due Date</label>
                <input
                    type="text"
                    name="due_date"
                    class="form-control"
                    v-model="dueDate"
                    readonly
                />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            query: "",
            issueDate: [],
            calcDate: [],
            dueDate: []
            // count: 0
        };
    },
    methods: {
        checkDueDate: function() {
            // var maxDays = this.myProps[1];
            // var maxBooks = this.myProps[2];
            // this.issueDate = moment(this.issueDate).format("DD-MM-YYYY");
            // console.log(this.issueDate);
            // alert(this.issueDate);
            // this.calcDate = moment(this.issueDate, "DD-MM-YYYY").add(
            //     maxDays,
            //     "days"
            // );
            // this.dueDate = moment(this.calcDate).format("YYYY-MM-DD");
            // console.log(this.issueDate);
            // console.log(this.dueDate);
        }
    },

    props: ["myProps"]
};
</script>
