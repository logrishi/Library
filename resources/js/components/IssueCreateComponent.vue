<template>
    <div>
        <div>
            <div class="form-group">
                <label>Issue Date</label>

                <DatePicker
                    v-model="issueDate"
                    @input="checkDueDate()"
                    color="red"
                    update-on-input
                    is-required
                    :input-props="{ placeholder: 'Issue Date' }"
                />
                <input
                    type="hidden"
                    name="issue_date"
                    v-model="issueDateSubmit"
                />
            </div>
        </div>

        <div v-if="reload">
            <div class="form-group">
                <label>Due Date</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="dueDate"
                    readonly
                />
                <input type="hidden" name="due_date" v-model="dueDateSubmit" />
            </div>
        </div>
    </div>
</template>
<script>
import Calendar from "v-calendar/lib/components/calendar.umd";
import DatePicker from "v-calendar/lib/components/date-picker.umd";

export default {
    components: {
        // Calendar,
        DatePicker
    },
    data() {
        return {
            query: "",
            issueDate: new Date(),
            issueDateSubmit: "",
            dueDateSubmit: "",
            dueDate: "",
            regNo: "",
            maxDays: "",
            reload: ""
        };
    },
    methods: {
        checkDueDate: function() {
            this.reload = false;
            this.regNo = this.issueCreateProps.regNo;
            this.maxDays = this.issueCreateProps.maxDays;
            // var iDate = parseInt(this.issueDate.format("d"));
            this.issueDateSubmit = this.issueDate.format("yy-m-d");
            // this.dueDateSubmit = this.dueDate.format("d-m-yy");
            // console.log("I " + this.issueDateSubmit);
            var iDate = this.issueDate;
            // this.issueDate = new Date(this.issueDate).format("d-m-y");
            Date.prototype.addDays = function(days) {
                var dDate = new Date(this.valueOf());
                dDate.setDate(iDate.getDate() + days);
                return dDate;
            };
            var dDate = iDate.addDays(this.maxDays);
            this.dueDate = dDate.format("m/d/yy");
            this.dueDateSubmit = dDate.format("yy-m-d");
            // console.log("d " + this.dueDateSubmit);
            this.reload = !this.reload;
        }
    },
    // props: ["myProps"]
    props: {
        issueCreateProps: {}
    }
};
</script>
