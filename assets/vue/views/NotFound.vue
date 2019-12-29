<template>
    <section class="pageNotFound">
        <div class="container">
            <span>Oops! Error 404</span>
            <h2 class="title">Page Not Found</h2>
            <p>We can't seem to find the page you're looking for.<br>Try to use the search</p>
            <form action="search">
                <input type="text" placeholder="Search Query...">
                <input type="button" value="Search" class="button">
            </form>
            <p>Or go to the home page to start over</p>
            <div class="goHome button"><a href="index.html">Go To Home Page</a></div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "NotFound"
    }
</script>

<style scoped lang="scss">
    @import "../assets/scss/vars";

    .pageNotFound {
        padding: 7vh 0;
        text-align: center;
        font-size: 1rem;

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .title {
            font-size: 2.3rem;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        input {
            margin-top: 5px;
            border-radius: 2px;
            &[type=text] {
                padding: 7px 15px;
                min-width: 25vw;
                border: 1px solid #ebebeb;
                &::placeholder {
                    color: #b3b3b3
                }
            }
            &[type=button] {
                font-weight: 500;
                padding: 7px 25px;
                margin-left: 15px;
                background-color: $accent;
                border: none;
            }
        }
        p {
            margin-bottom: 0;
            padding: 30px 0;
        }
        span {
            font-size: 6vw;
            font-weight: 700;
            color: #ebebeb;
        }
        .goHome {
            padding: 5px 15px;
            font-size: .95rem;
            font-weight: 500;
            background-color: #ebebeb;
        }
    }

</style>