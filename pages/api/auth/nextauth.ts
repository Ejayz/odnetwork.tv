import NextAuth  from "next-auth";
export default NextAuth({
    callbacks: {
      session({ session, token, user }) {
        return session
      },
    },
  })