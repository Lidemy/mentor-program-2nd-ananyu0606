var isPrime = require('./hw3')

describe("hw3", function() {
  it("should return correct answer when n = 1", function() {
    expect(isPrime(1)).toBe(false)
  })
  it("should return correct answer when n = 2", function(){
    expect(isPrime(2)).toBe(true)
  })
  it("should return correct answer when n = 2", function(){
    expect(isPrime(3)).toBe(true)
  })
  it("should return correct answer when n = 2", function(){
    expect(isPrime(100)).toBe(false)
  })
  it("should return correct answer when n = 2", function(){
    expect(isPrime(101)).toBe(true)
  })
})