<template>
    <div>
        <div>
            <div class="form-group">
                <label>Is Returned</label>
                <input
                    type="checkbox"
                    name="is_returned"
                    value="1"
                    id="is_returned"
                />
            </div>

            <div class="form-group">
                <label>Issue Date</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="issueDate"
                    readonly
                />
            </div>

            <div class="form-group">
                <label>Due Date</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="dueDate"
                    readonly
                />
            </div>

            <div class="form-group">
                <label>Return Date</label>
                <DatePicker
                    v-model="returnDate"
                    @input="checkFine()"
                    color="red"
                    update-on-input
                    is-required
                    name="return_date"
                    :min-date="issueDate"
                    :input-props="{ placeholder: 'Return Date' }"
                />
                <input
                    type="hidden"
                    name="return_date"
                    v-model="returnDateSubmit"
                />
            </div>
            <!--   {{ reload }} -->
            <!-- <div v-if="reload"> -->
            <div class="form-group">
                <label>Fine</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="fineGenerated"
                    name="fine_generated"
                    readonly
                />
            </div>
            <!-- </div> -->
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
            returnDate: new Date(),
            returnDateSubmit: "",
            issueDate: "",
            dueDate: "",
            maxDays: "",
            fineAmount: "",
            fineGenerated: ""
        };
    },
    methods: {
        checkFine: function() {
            // this.reload = false;
            this.maxDays = this.issueReturnProps.maxDays;
            this.fineAmount = this.issueReturnProps.fineAmount;
            this.issueDate = new Date(this.issueReturnProps.issueDate).format(
                "m/d/yy"
            );
            this.dueDate = new Date(this.issueReturnProps.dueDate).format(
                "m/d/yy"
            );
            this.returnDateSubmit = this.returnDate.format("yy-m-d");
            var rDate = new Date(this.returnDate).format("m/d/yy");
            var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date(this.dueDate);
            var secondDate = new Date(rDate);

            var diffDays = Math.round(
                (secondDate.getTime() - firstDate.getTime()) / oneDay
            );
            // console.log("r" + rDate);
            // console.log("fA " + this.fineAmount);
            // console.log("diffDays " + diffDays);
            // console.log("max " + this.maxDays);
            if (diffDays > 0) {
                this.fineGenerated = this.fineAmount * diffDays;
                console.log("fine " + this.fineGenerated);
            } else {
                this.fineGenerated = 0;
            }
            // this.reload = !this.reload;
        }
    },
    props: {
        issueReturnProps: {}
    }
};
</script>
