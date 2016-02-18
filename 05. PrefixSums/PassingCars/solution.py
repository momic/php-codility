def solution(A):
    west = 0    # The number of west-driving cars so far
    passing = 0 # The number of passing
 
    for index in range(len(A)-1,-1,-1):
        # Travel the list from the end to the beginning
        if A[index] == 0:    # A east-driving car
            passing += west
            if passing > 1000000000:
                return -1
        else:                # A west-driving car
            west += 1
 
    return passing